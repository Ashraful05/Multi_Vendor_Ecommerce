@extends('admin.master')
@section('title','Update Section Info')
@section('body')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Section Info</h4>
                        <a href="{{ url('admin/add-edit-section') }}" class="btn btn-outline-primary" style="float: right">Add New Section</a>
                        <div class="table-responsive pt-3">
                            <table id="sections" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>
                                         ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sections as $row => $section)
                                    <tr>
                                        <td>
                                            {{ $section['id']}}
                                        </td>
                                        <td>
                                            {{ $section['name'] }}
                                        </td>
                                        <td>
                                            @if($section['status']==1)
                                                <a href="javascript:void(0)" class="updateSectionStatus" id="section-{{ $section['id'] }}" section_id="{{ $section['id'] }}"><i style="font-size:30px;" class="mdi mdi-bookmark-check" status="Active"></i></a>
                                            @else
                                                <a href="javascript:void(0)" class="updateSectionStatus" id="section-{{ $section['id'] }}" section_id="{{ $section['id'] }}"><i style="font-size: 30px;" class="mdi mdi-bookmark-outline" status="InActive"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('add-edit-section',$section['id']) }}" ><i class="mdi mdi-pencil-box" style="font-size: 30px;"></i></a>
                                            <a id="confirmDelete" href="{{ route('delete-section',$section['id']) }}"><i class="mdi mdi-file-excel-box" style="font-size: 30px;"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

