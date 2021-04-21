<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i = 0; $i < 10; $i++){
            $model = new Order();
            $model->customer_name = $faker->name;
            $model->customer_email = $faker->email;
            $model->customer_phone_number = $faker->phoneNumber;
            $model->customer_address = $faker->streetAddress;
            $model->total_price = 0;
            $model->save();
            
            for($j = 0; $j < rand(1, 4); $j++){
                $productId = rand(1, 100);
                $quantity = rand(1, 5);
                $product = Product::find($productId);
                $model->total_price += $product->price * $quantity;

                $orderDetailModel = new OrderDetail();
                $orderDetailModel->order_id = $model->id;
                $orderDetailModel->product_id = $product->id;
                $orderDetailModel->quantity = $quantity;
                $orderDetailModel->unit_price = $product->price;
                $orderDetailModel->save();
            }
            // lưu hóa đơn 1 lần nữa để cập nhật tổng số tiền
            $model->save();
        }
        
    }
}
