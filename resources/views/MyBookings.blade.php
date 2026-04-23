<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Bookings') }}
        </h2>
    </x-slot>

    <div style="padding: 24px;">
        @if(session('success'))
            <div style="margin-bottom: 18px; padding: 14px 16px; border-radius: 14px; background: #dcfce7; color: #166534; font-weight: 700;">
                {{ session('success') }}
            </div>
        @endif

        <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 18px; overflow: hidden; box-shadow: 0 14px 30px rgba(15, 23, 42, 0.08);">
            <div style="padding: 24px; border-bottom: 1px solid #e5e7eb;">
                <h3 style="margin: 0 0 8px; font-size: 1.4rem; font-weight: 700; color: #111827;">My Bookings</h3>
                <p style="margin: 0; color: #6b7280;">Review your table reservations, reschedule details, or remove a booking you no longer need.</p>
            </div>

            <div style="overflow-x: auto;">
                <table style="width: 100%; min-width: 980px; border-collapse: collapse; font-family: Arial, sans-serif;">
                    <thead>
                        <tr style="background-color: #f8fafc;">
                            <th style="border-bottom: 1px solid #e5e7eb; padding: 16px; color: #6b7280; text-align: left;">Name</th>
                            <th style="border-bottom: 1px solid #e5e7eb; padding: 16px; color: #6b7280; text-align: left;">Email</th>
                            <th style="border-bottom: 1px solid #e5e7eb; padding: 16px; color: #6b7280; text-align: left;">Phone</th>
                            <th style="border-bottom: 1px solid #e5e7eb; padding: 16px; color: #6b7280; text-align: left;">Date</th>
                            <th style="border-bottom: 1px solid #e5e7eb; padding: 16px; color: #6b7280; text-align: left;">Time</th>
                            <th style="border-bottom: 1px solid #e5e7eb; padding: 16px; color: #6b7280; text-align: left;">Guests</th>
                            <th style="border-bottom: 1px solid #e5e7eb; padding: 16px; color: #6b7280; text-align: left;">Message</th>
                            <th style="border-bottom: 1px solid #e5e7eb; padding: 16px; color: #6b7280; text-align: left;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($myBookings as $booking)
                            <tr>
                                <td style="border-bottom: 1px solid #e5e7eb; padding: 16px;">{{ $booking->name }}</td>
                                <td style="border-bottom: 1px solid #e5e7eb; padding: 16px;">{{ $booking->email }}</td>
                                <td style="border-bottom: 1px solid #e5e7eb; padding: 16px;">{{ $booking->phone }}</td>
                                <td style="border-bottom: 1px solid #e5e7eb; padding: 16px;">{{ $booking->date }}</td>
                                <td style="border-bottom: 1px solid #e5e7eb; padding: 16px;">{{ $booking->time }}</td>
                                <td style="border-bottom: 1px solid #e5e7eb; padding: 16px;">{{ $booking->guest_number }}</td>
                                <td style="border-bottom: 1px solid #e5e7eb; padding: 16px;">{{ $booking->message ?: 'No message provided.' }}</td>
                                <td style="border-bottom: 1px solid #e5e7eb; padding: 16px;">
                                    <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                                        <a href="{{ route('bookings.edit', $booking->id) }}" style="display: inline-flex; align-items: center; justify-content: center; padding: 8px 14px; border-radius: 10px; background: #dbeafe; color: #1d4ed8; font-weight: 700; text-decoration: none;">Reschedule</a>
                                        <form method="POST" action="{{ route('bookings.delete', $booking->id) }}" onsubmit="return confirm('Are you sure you want to remove this booking?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="padding: 8px 14px; border-radius: 10px; background: #fee2e2; color: #b91c1c; font-weight: 700; border: none; cursor: pointer;">Remove</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" style="padding: 32px 20px; text-align: center; color: #6b7280;">
                                    You have not created any table bookings yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
