<?php

it('returns a successful response', function () {
    $response = $this->get('/');

    $response
        ->assertStatus(200)
        ->assertSee('Login')
        ->assertSee('Sign Up')
        ->assertSee(route('login', absolute: false))
        ->assertSee(route('register', absolute: false))
        ->assertSee('user/assets/vendor/swiper/swiper-bundle.min.js')
        ->assertDontSee('class="testimonial-item" "="', false)
        ->assertDontSee(route('dashboard', absolute: false))
        ->assertDontSee('value="logout"', false);
});

it('requires authentication for the dashboard route', function () {
    $this->get('/dashboard')
        ->assertRedirect(route('login', absolute: false));
});
