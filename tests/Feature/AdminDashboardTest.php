<?php

use App\Models\BookTable;
use App\Models\Food;
use App\Models\Orders;
use App\Models\User;

it('shows admin food and booked table sections on the dashboard', function () {
    $admin = User::factory()->create([
        'usertype' => 'admin',
    ]);

    Food::create([
        'food_name' => 'Jollof Rice',
        'food_details' => 'Smoky rice with grilled chicken',
        'food_image' => 'jollof.png',
        'food_price' => 18,
        'food_type' => 'Main Course',
    ]);

    Orders::create([
        'customer_id' => $admin->id,
        'customer_name' => 'Ada Obi',
        'customer_email' => 'ada@example.com',
        'customer_Address' => 'Lagos',
        'customer_phone' => '08000000000',
        'Food_name' => 'Jollof Rice',
        'Food_type' => 'Main Course',
        'Food_image' => 'jollof.png',
        'Food_price' => 18,
        'Food_quantity' => 1,
        'order_status' => 'in progress',
    ]);

    BookTable::create([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '08123456789',
        'date' => '2026-04-30',
        'time' => '19:00',
        'guest_number' => 4,
        'message' => 'Window seat please',
    ]);

    $this->actingAs($admin)
        ->get(route('dashboard', absolute: false))
        ->assertOk()
        ->assertSee('Admin Dashboard')
        ->assertSee('Food Section')
        ->assertSee('Add Food')
        ->assertSee('View Food')
        ->assertSee('1 Food Items')
        ->assertSee('Booked Tables')
        ->assertSee('1 Reservations')
        ->assertSee('Total Orders')
        ->assertSee('View Orders')
        ->assertSee(route('admin.addfood', absolute: false), false)
        ->assertSee(route('admin.showfood', absolute: false), false)
        ->assertSee(route('admin.viewbookedtable', absolute: false), false);
});

it('shows booked tables in the admin layout', function () {
    $admin = User::factory()->create([
        'usertype' => 'admin',
    ]);

    BookTable::create([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '08123456789',
        'date' => '2026-04-30',
        'time' => '19:00',
        'guest_number' => 4,
        'message' => 'Window seat please',
    ]);

    $this->actingAs($admin)
        ->get(route('admin.viewbookedtable', absolute: false))
        ->assertOk()
        ->assertSee('Booked Tables')
        ->assertSee('john@example.com')
        ->assertSee('Window seat please')
        ->assertSee('4 Guests');
});

it('shows the styled add food form for admins', function () {
    $admin = User::factory()->create([
        'usertype' => 'admin',
    ]);

    $this->actingAs($admin)
        ->get(route('admin.addfood', absolute: false))
        ->assertOk()
        ->assertSee('Add New Food Item')
        ->assertSee('Food Name')
        ->assertSee('Food Price')
        ->assertSee('Food Type')
        ->assertSee('Food Image')
        ->assertSee('Food Details')
        ->assertSee('Upload a clear image for the menu display.')
        ->assertSee(route('admin.postaddfood', absolute: false), false);
});

it('shows the styled food list for admins', function () {
    $admin = User::factory()->create([
        'usertype' => 'admin',
    ]);

    Food::create([
        'food_name' => 'Pepper Soup',
        'food_details' => 'Hot and spicy local soup',
        'food_image' => 'pepper-soup.png',
        'food_price' => 12,
        'food_type' => 'Starters',
    ]);

    $this->actingAs($admin)
        ->get(route('admin.showfood', absolute: false))
        ->assertOk()
        ->assertSee('Food Menu Items')
        ->assertSee('Pepper Soup')
        ->assertSee('Hot and spicy local soup')
        ->assertSee('Starters')
        ->assertSee('$12.00', false)
        ->assertSee('Update')
        ->assertSee('Delete');
});
