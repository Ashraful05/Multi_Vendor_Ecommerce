<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $categories = [
            ['parent_id'=>0,'section_id'=>1,'category_name'=>'Men','category_image'=>'',
            'category_discount'=>0,'description'=>$faker->text,'url'=>'men','meta_title'=>'',
            'meta_description'=>'','meta_keywords'=>'','status'=>1],
            ['parent_id'=>0,'section_id'=>1,'category_name'=>'Women','category_image'=>'',
                'category_discount'=>0,'description'=>$faker->text,'url'=>'women','meta_title'=>'',
                'meta_description'=>'','meta_keywords'=>'','status'=>1],
            ['parent_id'=>0,'section_id'=>1,'category_name'=>'Kids','category_image'=>'',
                'category_discount'=>0,'description'=>$faker->text,'url'=>'kids','meta_title'=>'',
                'meta_description'=>'','meta_keywords'=>'','status'=>1],
        ];
        foreach($categories as $category)
        {
            Category::create($category);
        }
    }
}
