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
        DB::table('posts')->insert([
                 'title' => 'Healthy Salad',
                'product_name' => 'Salad',
                'boby' => 'A delicious and healthy green salad.',
                'fat' => 5.25,
                'protein' => 2.5,
                'likes_count' => 10,
                'created_at' => now(),
                'updated_at' => now(),
                
                
         ]);
    }
}
