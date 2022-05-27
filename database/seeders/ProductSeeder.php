<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $faker = \Faker\Factory::create();
        
        for ($loop = 0; $loop < 15; $loop++) {
            
            DB::table("products")->insert([
                "name" => $faker->name(),
                "price"=>$faker->numberBetween(45, 95),
                "year"=>$faker->year(),
                "product_type"=>$faker->randomElement(["Fruit", "Vegetable", "Grains"]),
                "created_at"=>$faker->date(),	
                "updated_at"=>$faker->date(),
            ]);
        }
    }
}
