<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
          ['section_id'=>2,'category_id'=>5,'brand_id'=>5,'vendor_id'=>1,'admin_id'=>0,'admin_type'=>'vendor',
              'product_name'=>'LG Air Conditioner R32 Wall Unit Dual Cool AP09RT 2.5 kW I 9000 BTU',
              'product_code'=>'lg-2022','product_color'=>'white','product_price'=>200000,'product_discount'=>5,
              'product_weight'=>'80kg','is_featured'=>'yes','status'=>1],
            ['section_id'=>1,'category_id'=>1,'brand_id'=>1,'vendor_id'=>0,'admin_id'=>1,'admin_type'=>'superadmin',
              'product_name'=>'Black Arrow Mens Shirts Mavel Oliver Queen Green Arrow T-shirts | WishiningBlack Arrow Mens Shirts Mav',
              'product_code'=>'Arrow-2022','product_color'=>'black','product_price'=>2000,'product_discount'=>5,
              'product_weight'=>'100gm','is_featured'=>'yes','status'=>1]
        ];

        foreach ($products as $product)
        {
            Product::create($product);
        }
    }
}
