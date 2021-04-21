<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker;
use App\Models\Product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i = 0; $i < 100; $i++){
            $model = new Product();
            $model->fill([
                'name' => $faker->name,
                'price' => $faker->numberBetween($min = 1000, $max = 10000000),
                'cate_id' => rand(9, 30),
                'detail' => $faker->realText(150, 2),
                'image'=> "images/anh-".rand(1, 4).".jpg"
            ]);
            $model->save();
        }
        //
    }
}
