<?php

it('shows date and time booking dropdowns on the homepage', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('name="date"', false)
        ->assertSee('name="time"', false)
        ->assertSee('type="date"', false)
        ->assertSee('type="time"', false)
        ->assertSee('<input type="date" name="date" class="form-control" id="date"', false)
        ->assertSee('<input type="time" class="form-control" name="time" id="time"', false);
});
