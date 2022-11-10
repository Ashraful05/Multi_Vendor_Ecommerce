<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SectionController extends Controller
{
    public function sections()
    {
        Session::put('page','sections');
        $sections = Section::get();
        return view('admin.sections.section_info',compact('sections'));
    }
    public function updateSectionStatus(Request $request)
    {
        if($request->ajax())
        {
            $data = $request->all();
//            echo "<pre>"; print_r($data); die();
            if($data['status']=='Active')
            {
                $status=0;
            }else{
                $status=1;
            }
            Section::where('id',$data['section_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);
        }
    }
    public function deleteSection($id)
    {
        $section = Section::find($id);
        $section->delete();
        $notification = array(
            'message'=>'Section Info Deleted!!',
            'alert-type'=>'error'
        );
        return redirect()->back()->with($notification);
    }
    public function addEditSection(Request $request,$id=null)
    {
        Session::put('page','sections');
        if($id=="")
        {
            $title="Add Section Page";
            $section = new Section();
            $notification = array(
                'message'=>'Section Info Added!!',
                'alert-type'=>'success'
            );
        }else{
            $title="Edit Section Page";
            $section=Section::find($id);
            $notification = array(
                'message'=>'Section Info Updated!!',
                'alert-type'=>'info'
            );
        }
        if($request->isMethod('post'))
        {
            $rules=[
                'name'=>'required|regex:/^[\pL\s\-]+$/u',
            ];
            $customMessages=[
                'name.required'=>'Section Name is required',
                'name.reges'=>'Valid Section name is required',
            ];
            $this->validate($request,$rules,$customMessages);
            $section->name=$request->name;
            $section->status=1;
            $section->save();
            return redirect()->route('admin.sections')->with($notification);
        }
        return view('admin.sections.add_edit_section',compact('title','section'))->with($notification);
    }
}
