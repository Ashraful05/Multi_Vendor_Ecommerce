<?php

namespace Database\Seeders;

use App\Models\ProductsAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productAttributes = [
            ['product_id'=>2,'size'=>'small','price'=>500,'stock'=>10,'sku'=>'BC001-S','status'=>1],
            ['product_id'=>2,'size'=>'medium','price'=>550,'stock'=>10,'sku'=>'BC001-M','status'=>1],
            ['product_id'=>2,'size'=>'large','price'=>570,'stock'=>10,'sku'=>'BC001-L','status'=>1],
        ];
        foreach ($productAttributes as $productAttribute)
        {
            ProductsAttribute::create($productAttribute);
        }
    }
}
