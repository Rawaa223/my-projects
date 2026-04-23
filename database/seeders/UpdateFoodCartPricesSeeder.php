<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpdateFoodCartPricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\FoodCart::all()->each(function($cart) {
            $food_price = $cart->food->food_price ?? 0;
            $cart->update(['food_price' => $cart->food_quantity * $food_price]);
        });
    }
}
