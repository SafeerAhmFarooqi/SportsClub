<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'name' => 'AS Hard ball cricket bat',
                'price' => '8000',
                'category' => 'Cricket Items',
                'description' => 'Light weight thick grip',
                'gallery' => 'http://asonlineshop.com/uploads/images/medium/f5a79ed5b77d3ae3781aa63a244cda25.jpg',
            ],
            [
                'name' => 'kookaburra Ball',
                'price' => '5000',
                'category' => 'Cricket Items',
                'description' => 'New Ball',
                'gallery' => 'https://cdn-d03d5231-5b2e278c.mysagestore.com/cf738e9579802e6b988bb225ca6bc00c/contents/1A1104/1A1104M01-cricket-ball-regulation-front.jpg',
            ],
            [
                'name' => 'Football',
                'price' => '6000',
                'category' => 'Football Items',
                'description' => 'Light weight ball',
                'gallery' => 'https://static-01.daraz.pk/p/59c84b1253863efe7f88ce0cc1f4c069.jpg',
            ],
            [
                'name' => 'Football Kit',
                'price' => '8000',
                'category' => 'Football Items',
                'description' => 'Large Size Kit',
                'gallery' => 'https://bucket.pk/wp-content/uploads/2019/06/Rakuten-Football-Kit-Shirt-and-Short-600x600.jpg',
            ],
            [
                'name' => 'Football Shoes',
                'price' => '7000',
                'category' => 'Football Items',
                'description' => 'Large Size Shoes',
                'gallery' => 'https://rukminim1.flixcart.com/image/714/857/jngcn0w0/shoe/y/v/j/1164-10-nivia-green-black-original-imafa57hg2qmh5eb.jpeg',
            ]
        ]);
    }
}
