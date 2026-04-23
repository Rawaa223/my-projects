<?php

use App\Models\FoodCart;
use App\Models\User;

it('stores confirmed orders using the orders table column names', function () {
    $user = User::factory()->create([
        'address' => 'Italy',
        'phone' => '2284300',
    ]);

    FoodCart::create([
        'userID' => $user->id,
        'food_id' => 1,
        'food_name' => 'Soup',
        'food_details' => 'Hot starter',
        'food_image' => '1776698034.png',
        'food_quantity' => 2,
        'food_price' => 6,
        'food_type' => 'Starters',
    ]);

    $this->actingAs($user)
        ->from(route('food.cart', absolute: false))
        ->post(route('cart.confirm', absolute: false))
        ->assertRedirect(route('food.cart', absolute: false));

    $this->assertDatabaseHas('orders', [
        'customer_name' => $user->name,
        'customer_email' => $user->email,
        'customer_Address' => 'Italy',
        'customer_phone' => '2284300',
        'Food_name' => 'Soup',
        'Food_type' => 'Starters',
        'Food_image' => '1776698034.png',
        'Food_price' => 6,
        'Food_quantity' => 2,
        'order_status' => 'in progress',
    ]);
});
