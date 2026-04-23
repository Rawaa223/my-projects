<?php

use App\Models\Orders;
use App\Models\User;

it('shows the authenticated user order status details', function () {
    $user = User::factory()->create([
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
    ]);

    Orders::create([
        'customer_id' => (string) $user->id,
        'customer_name' => 'Jane Doe',
        'customer_email' => 'jane@example.com',
        'customer_Address' => 'Abuja',
        'customer_phone' => '08011111111',
        'Food_name' => 'Fried Rice',
        'Food_type' => 'Specialty',
        'Food_image' => 'fried-rice.png',
        'Food_price' => 15,
        'Food_quantity' => 2,
        'order_status' => 'in progress',
    ]);

    $this->actingAs($user)
        ->get(route('Order.Status', absolute: false))
        ->assertOk()
        ->assertSee('My Orders')
        ->assertSee('Jane Doe')
        ->assertSee('jane@example.com')
        ->assertSee('Fried Rice')
        ->assertSee('$15.00', false)
        ->assertSee('2')
        ->assertSee('in progress');
});
