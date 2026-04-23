<?php

use App\Models\BookTable;
use App\Models\User;

it('shows the authenticated user bookings page', function () {
    $user = User::factory()->create();

    BookTable::create([
        'customer_id' => $user->id,
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'phone' => '08012345678',
        'date' => '2026-05-01',
        'time' => '18:00',
        'guest_number' => 3,
        'message' => 'Birthday dinner',
    ]);

    $this->actingAs($user)
        ->get(route('bookings.index', absolute: false))
        ->assertOk()
        ->assertSee('My Bookings')
        ->assertSee('Birthday dinner')
        ->assertSee('Reschedule')
        ->assertSee('Remove');
});

it('allows a user to update their own booking', function () {
    $user = User::factory()->create();

    $booking = BookTable::create([
        'customer_id' => $user->id,
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'phone' => '08012345678',
        'date' => '2026-05-01',
        'time' => '18:00',
        'guest_number' => 3,
        'message' => 'Birthday dinner',
    ]);

    $this->actingAs($user)
        ->patch(route('bookings.update', $booking->id, absolute: false), [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'phone' => '08012345678',
            'date' => '2026-05-02',
            'time' => '20:00',
            'guest_number' => 5,
            'message' => 'Updated reservation',
        ])
        ->assertRedirect(route('bookings.index', absolute: false));

    $this->assertDatabaseHas('book_tables', [
        'id' => $booking->id,
        'customer_id' => $user->id,
        'date' => '2026-05-02',
        'time' => '20:00',
        'guest_number' => 5,
        'message' => 'Updated reservation',
    ]);
});

it('allows a user to remove their own booking', function () {
    $user = User::factory()->create();

    $booking = BookTable::create([
        'customer_id' => $user->id,
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'phone' => '08012345678',
        'date' => '2026-05-01',
        'time' => '18:00',
        'guest_number' => 3,
        'message' => 'Birthday dinner',
    ]);

    $this->actingAs($user)
        ->delete(route('bookings.delete', $booking->id, absolute: false))
        ->assertRedirect(route('bookings.index', absolute: false));

    $this->assertDatabaseMissing('book_tables', [
        'id' => $booking->id,
    ]);
});

it('shows updated booking details to admins', function () {
    $admin = User::factory()->create([
        'usertype' => 'admin',
    ]);

    BookTable::create([
        'customer_id' => 1,
        'name' => 'Jane Doe',
        'email' => 'jane@example.com',
        'phone' => '08012345678',
        'date' => '2026-05-02',
        'time' => '20:00',
        'guest_number' => 5,
        'message' => 'Updated reservation',
    ]);

    $this->actingAs($admin)
        ->get(route('admin.viewbookedtable', absolute: false))
        ->assertOk()
        ->assertSee('Booked Tables')
        ->assertSee('Updated reservation')
        ->assertSee('5 Guests')
        ->assertSee('Updated');
});
