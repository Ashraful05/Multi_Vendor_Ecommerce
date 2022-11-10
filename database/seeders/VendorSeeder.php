<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
//        for($i=1;$i<=5;$i++){
//            Vendor::create([
//                'name'=>$faker->name,
//                'email'=>$faker->email,
//                'password'=>Hash::make('ashraful5'),
//                'address'=>$faker->address,
//                'city'=>$faker->city,
//                'mobile'=>$faker->phoneNumber(),
//                'country'=>$faker->country,
//                'status'=>0
//            ]);
//        }
        $vendors=[
            'name'=>'Sub Admin','email'=>'vendor@gmail.com','password'=>Hash::make('ashraful5'),
            'city'=>'Dubai','mobile'=>'0170772300','country'=>'UAE','status'=>1,'address'=>$faker->address,
        ];
        Vendor::insert($vendors);

    }
}
