<?php

namespace Database\Seeders;

use App\Models\VendorsBusinessDetails;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsBusinessDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $vendorRecords=[
            [
                'vendor_id'=>1,
                'shop_name'=>$faker->company,
                'shop_address'=>$faker->streetAddress,
                'shop_city'=>$faker->city,
                'shop_country'=>$faker->country,
                'shop_state'=>'Dhaka',
                'shop_pincode'=>rand(1,100),
                'shop_mobile'=>$faker->phoneNumber(),
                'shop_website'=>"www.sitemakers.in",
                'shop_email'=>'vendor@gmail.com',
                'address_proof'=>'Passport',
                'address_proof_image'=>'test.png',
                'business_license_number'=>'34242245',
                'gst_number'=>"njh908",
                'pan_number'=>rand(1,1000),
            ]
        ];
            VendorsBusinessDetails::insert($vendorRecords);
    }
}
