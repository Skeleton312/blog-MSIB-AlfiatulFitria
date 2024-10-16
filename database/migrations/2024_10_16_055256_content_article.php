<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('articles')->insert([
            [
                'title' => 'Exploring the World of Electronics',
                'content' => 'Electronics are integral to modern life. From smartphones to laptops, they enhance our daily activities. This article explores various gadgets and their impact on society.',
                'user_id' => 1,
                'category_id' => 1,
                'image' => 'https://img.freepik.com/free-photo/medium-shot-man-wearing-vr-glasses_23-2149126949.jpg?t=st=1728924782~exp=1728928382~hmac=5449de225b91f63089fc66ab97f7f92a084f5ee2c300c83597275ab27b9d86ff&w=1060',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Fashion Trends for 2024',
                'content' => 'Fashion is ever-evolving, with new trends emerging every season. This article discusses the top fashion trends to watch in 2024. Stay ahead of the curve with these insights.',
                'user_id' => 1,
                'category_id' => 3,
                'image' => 'https://img.freepik.com/free-photo/woman-looking-clothes-side-view_23-2149726083.jpg?t=st=1728925145~exp=1728928745~hmac=9e22451b4abc80a14a91cb0431f2fcf1dddb15019fc580a403edaa8bbdd1e5ed&w=996',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Delicious Recipes for Home Chefs',
                'content' => 'Cooking at home can be both fun and rewarding. This article shares easy-to-follow recipes for delicious meals. Discover your inner chef with these simple dishes.',
                'user_id' => 1,
                'category_id' => 4,
                'image' => 'https://img.freepik.com/free-photo/fried-crab-with-curry-powder-plate-with-bell-peppers-tomatoes_1150-25705.jpg?t=st=1728925248~exp=1728928848~hmac=19183b477e4e53ef14bd31440c17267c3463823fb830c20b38480da8d3621a08&w=996',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Importance of Physical Fitness',
                'content' => 'Physical fitness plays a crucial role in maintaining a healthy lifestyle. This article outlines various exercises and their benefits. Get inspired to stay active and fit.',
                'user_id' => 1,
                'category_id' => 5,
                'image' => 'https://img.freepik.com/free-photo/men-exercise-by-running-road-bridge_1150-22952.jpg?t=st=1728925318~exp=1728928918~hmac=40b780d3881fff755af99a1fee790efc0cb0057333f5fb367daddb4ba471315b&w=996',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('articles')->whereIn('title', [
            'Exploring the World of Electronics',
            'The Beauty of Nature',
            'Fashion Trends for 2024',
            'Delicious Recipes for Home Chefs',
            'The Importance of Physical Fitness',
        ])->delete();
    }
};
