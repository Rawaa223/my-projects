<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Booking') }}
        </h2>
    </x-slot>

    <div style="padding: 24px;">
        <div style="max-width: 860px; margin: 0 auto; background: #ffffff; border: 1px solid #e5e7eb; border-radius: 18px; overflow: hidden; box-shadow: 0 14px 30px rgba(15, 23, 42, 0.08);">
            <div style="padding: 24px; border-bottom: 1px solid #e5e7eb;">
                <h3 style="margin: 0 0 8px; font-size: 1.4rem; font-weight: 700; color: #111827;">Reschedule Booking</h3>
                <p style="margin: 0; color: #6b7280;">Update your reservation details below. The admin bookings table will reflect the latest changes.</p>
            </div>

            <form method="POST" action="{{ route('bookings.update', $booking->id) }}" style="padding: 24px;">
                @csrf
                @method('PATCH')

                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 18px;">
                    <div>
                        <label for="name" style="display: block; margin-bottom: 8px; font-weight: 700; color: #374151;">Name</label>
                        <input id="name" name="name" type="text" value="{{ old('name', $booking->name) }}" required style="width: 100%; padding: 12px 14px; border-radius: 12px; border: 1px solid #d1d5db;">
                    </div>
                    <div>
                        <label for="email" style="display: block; margin-bottom: 8px; font-weight: 700; color: #374151;">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email', $booking->email) }}" required style="width: 100%; padding: 12px 14px; border-radius: 12px; border: 1px solid #d1d5db;">
                    </div>
                    <div>
                        <label for="phone" style="display: block; margin-bottom: 8px; font-weight: 700; color: #374151;">Phone</label>
                        <input id="phone" name="phone" type="text" value="{{ old('phone', $booking->phone) }}" required style="width: 100%; padding: 12px 14px; border-radius: 12px; border: 1px solid #d1d5db;">
                    </div>
                    <div>
                        <label for="guest_number" style="display: block; margin-bottom: 8px; font-weight: 700; color: #374151;">Guests</label>
                        <input id="guest_number" name="guest_number" type="number" min="1" max="20" value="{{ old('guest_number', $booking->guest_number) }}" required style="width: 100%; padding: 12px 14px; border-radius: 12px; border: 1px solid #d1d5db;">
                    </div>
                    <div>
                        <label for="date" style="display: block; margin-bottom: 8px; font-weight: 700; color: #374151;">Date</label>
                        <input id="date" name="date" type="date" value="{{ old('date', $booking->date) }}" required style="width: 100%; padding: 12px 14px; border-radius: 12px; border: 1px solid #d1d5db;">
                    </div>
                    <div>
                        <label for="time" style="display: block; margin-bottom: 8px; font-weight: 700; color: #374151;">Time</label>
                        <input id="time" name="time" type="time" value="{{ old('time', $booking->time) }}" required style="width: 100%; padding: 12px 14px; border-radius: 12px; border: 1px solid #d1d5db;">
                    </div>
                </div>

                <div style="margin-top: 18px;">
                    <label for="message" style="display: block; margin-bottom: 8px; font-weight: 700; color: #374151;">Message</label>
                    <textarea id="message" name="message" style="width: 100%; min-height: 140px; padding: 12px 14px; border-radius: 12px; border: 1px solid #d1d5db; resize: vertical;">{{ old('message', $booking->message) }}</textarea>
                </div>

                <div style="display: flex; gap: 12px; justify-content: flex-end; margin-top: 24px;">
                    <a href="{{ route('bookings.index') }}" style="display: inline-flex; align-items: center; padding: 10px 16px; border-radius: 12px; background: #f3f4f6; color: #374151; font-weight: 700; text-decoration: none;">Cancel</a>
                    <button type="submit" style="padding: 10px 16px; border-radius: 12px; background: #0f766e; color: #ffffff; font-weight: 700; border: none; cursor: pointer;">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
