<?php

use App\Models\Orders;
use App\Models\User;

it('shows a clean orders table for admins', function () {
    $admin = User::factory()->create([
        'usertype' => 'admin',
    ]);

    Orders::create([
        'customer_id' => $admin->id,
        'customer_name' => 'Mohamed Amine Souissi',
        'customer_email' => 'souissiamine@gmail.com',
        'customer_Address' => 'Italy',
        'customer_phone' => '2284300',
        'Food_name' => 'Soup',
        'Food_type' => 'Starters',
        'Food_image' => '1776698034.png',
        'Food_price' => 6,
        'Food_quantity' => 2,
        'order_status' => 'in progress',
    ]);

    $this->actingAs($admin)
        ->get(route('admin.vieworders', absolute: false))
        ->assertOk()
        ->assertSee('Customer Orders')
        ->assertSee('Customer Name')
        ->assertSee('Customer Email')
        ->assertSee('Order Status')
        ->assertSee('Mohamed Amine Souissi')
        ->assertSee('souissiamine@gmail.com')
        ->assertSee('Starters')
        ->assertSee('$6.00', false)
        ->assertSee('in progress')
        ->assertSee('Delivered')
        ->assertSee('Cancel')
        ->assertDontSee('customer_name')
        ->assertDontSee('order_status')
        ->assertDontSee('$0.00', false);
});
