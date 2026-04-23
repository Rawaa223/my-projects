<?php

use App\Models\BookTable;

it('stores a table booking request', function () {
    $this->from('/')
        ->post(route('book.table', absolute: false), [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'phone' => '123456789',
            'date' => '2026-04-25',
            'time' => '18:30',
            'guest_number' => 4,
            'message' => 'Window seat please',
        ])
        ->assertRedirect('http://localhost:8000#book-a-table');

    $this->assertDatabaseHas('book_tables', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'phone' => '123456789',
        'date' => '2026-04-25',
        'time' => '18:30',
        'guest_number' => 4,
        'message' => 'Window seat please',
    ]);
});
