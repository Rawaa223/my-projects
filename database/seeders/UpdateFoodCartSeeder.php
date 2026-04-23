<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpdateFoodCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\FoodCart::whereNull('food_type')->each(function($cart) {
            $cart->update(['food_type' => $cart->food->food_type]);
        });
    }
}
