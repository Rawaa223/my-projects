<?php

use App\Models\Food;
use App\Models\FoodCart;
use App\Models\User;

it('removes the selected quantity from a cart item', function () {
    $user = User::factory()->create();
    $food = Food::create([
        'food_name' => 'Pasta',
        'food_details' => 'Creamy pasta',
        'food_image' => 'pasta.jpg',
        'food_price' => 1500,
        'food_type' => 'Dinner',
    ]);

    $cartItem = FoodCart::create([
        'userID' => $user->id,
        'food_id' => $food->id,
        'food_name' => $food->food_name,
        'food_details' => $food->food_details,
        'food_image' => $food->food_image,
        'food_quantity' => 2,
        'food_price' => 3000,
        'food_type' => $food->food_type,
    ]);

    $this->actingAs($user)
        ->from(route('food.cart', absolute: false))
        ->delete(route('delete.cart', $cartItem->id, absolute: false), [
            'quantity' => 1,
        ])
        ->assertRedirect(route('food.cart', absolute: false));

    expect($cartItem->fresh())
        ->food_quantity->toBe(1)
        ->food_price->toBe(1500);
});

it('deletes the cart item when the selected quantity matches the cart quantity', function () {
    $user = User::factory()->create();
    $food = Food::create([
        'food_name' => 'Pasta',
        'food_details' => 'Creamy pasta',
        'food_image' => 'pasta.jpg',
        'food_price' => 1500,
        'food_type' => 'Dinner',
    ]);

    $cartItem = FoodCart::create([
        'userID' => $user->id,
        'food_id' => $food->id,
        'food_name' => $food->food_name,
        'food_details' => $food->food_details,
        'food_image' => $food->food_image,
        'food_quantity' => 1,
        'food_price' => 1500,
        'food_type' => $food->food_type,
    ]);

    $this->actingAs($user)
        ->from(route('food.cart', absolute: false))
        ->delete(route('delete.cart', $cartItem->id, absolute: false), [
            'quantity' => 1,
        ])
        ->assertRedirect(route('food.cart', absolute: false));

    $this->assertDatabaseMissing('food_carts', [
        'id' => $cartItem->id,
    ]);
});

it('deletes the cart item when the selected quantity is greater than the cart quantity', function () {
    $user = User::factory()->create();
    $food = Food::create([
        'food_name' => 'Pasta',
        'food_details' => 'Creamy pasta',
        'food_image' => 'pasta.jpg',
        'food_price' => 1500,
        'food_type' => 'Dinner',
    ]);

    $cartItem = FoodCart::create([
        'userID' => $user->id,
        'food_id' => $food->id,
        'food_name' => $food->food_name,
        'food_details' => $food->food_details,
        'food_image' => $food->food_image,
        'food_quantity' => 2,
        'food_price' => 3000,
        'food_type' => $food->food_type,
    ]);

    $this->actingAs($user)
        ->from(route('food.cart', absolute: false))
        ->delete(route('delete.cart', $cartItem->id, absolute: false), [
            'quantity' => 5,
        ])
        ->assertRedirect(route('food.cart', absolute: false));

    $this->assertDatabaseMissing('food_carts', [
        'id' => $cartItem->id,
    ]);
});
