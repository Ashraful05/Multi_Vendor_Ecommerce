<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            ['name'=>'Super Admin', 'type'=>'superadmin', 'vendor_id'=>0, 'mobile'=>'0190002300',
                'email'=>'admin@admin.com','password'=>Hash::make('ashraful5'), 'image' => '', 'status'=>1],
            ['name'=>'Sub Admin', 'type'=>'vendor', 'vendor_id'=>1, 'mobile'=>'0170772300',
                'email'=>'vendor@gmail.com','password'=>Hash::make('ashraful5'), 'image' => '', 'status'=>1]
        ];
        foreach ($admins as $admin)
        {
            Admin::create($admin);
        }
//            Admin::create([
//                'name'=>'Super Admin', 'type'=>'subadmin', 'vendor_id'=>0, 'mobile'=>'0170772300',
//                'email'=>'admin@gmail.com','password'=>Hash::make('ashraful5'), 'image' => '', 'status'=>1
//            ]);

    }
}
