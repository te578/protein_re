<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
 use DateTime;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
         DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // テーブルをクリア
        DB::table('posts')->truncate();
        
        // 外部キー制約を有効に戻すlikesが持っているからstatement
        //('SET FOREIGN_KEY_CHECKS=0;');しなければならない
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        DB::table('posts')->insert([
                 [
                'user_id' => 1,
                'title' => 'Healthy Salad',
                'product_name' => 'Salad',
                'body' => 'A delicious and healthy green salad.',
                'fat' => 5.25,
                'protein' => 2.5,
                'carbohydrates' => 10.0,
                'likes_count' => 10,
                'created_at' => now(),
                'updated_at' => now(),
                ],
                [
                'user_id' => 1,
                'title' => 'Fruit Smoothie',
                'product_name' => 'Smoothie',
                'body' => 'A refreshing fruit smoothie for a healthy snack.',
                'fat' => 3.0,
                'protein' => 1.5,
                'carbohydrates' => 15.0,
                'likes_count' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'title' => 'Grilled Chicken',
                'product_name' => 'Chicken',
                'body' => 'Juicy grilled chicken seasoned to perfection.',
                'fat' => 8.0,
                'protein' => 30.0,
                'carbohydrates' => 2.0,
                'likes_count' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
         ]);
    }
}
