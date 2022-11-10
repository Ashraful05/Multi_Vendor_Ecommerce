<?php

namespace Database\Seeders;

use App\Models\VendorsBankDetails;
use App\Models\VendorsBusinessDetails;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsBankDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $vendorBankRecords=[
            [
                'vendor_id'=>1,
                'account_holder_name'=>'Sub Admin',
                'bank_name'=>"Sonali Bank",
                'account_number'=>$faker->creditCardNumber,
                'bank_ifsc_code'=>$faker->currencyCode,
            ]
        ];
        VendorsBankDetails::insert($vendorBankRecords);
    }
}
