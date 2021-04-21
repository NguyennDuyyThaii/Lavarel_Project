<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_lst = [
            [
                'name' => 'administrator',
                'email' => 'thienth@fpt.edu.vn',
                'password' => Hash::make('123456')
            ],
            [
                'name' => 'member',
                'email' => 'thienth32@fe.edu.vn',
                'password' => Hash::make('123456')
            ]
        ];

        foreach($user_lst as $item){
            $model = new User();
            $model->fill($item);
            $model->save();
        }
        
    }
}
