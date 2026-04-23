<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div style="padding: 24px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 20px;">
            <div style="background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%); color: #fff; border-radius: 20px; padding: 24px; box-shadow: 0 18px 36px rgba(29, 78, 216, 0.2);">
                <span style="display: inline-block; padding: 6px 12px; border-radius: 999px; background: rgba(255, 255, 255, 0.16); font-size: 12px; text-transform: uppercase; letter-spacing: 0.08em;">Orders</span>
                <h3 style="margin: 16px 0 8px; font-size: 1.6rem; font-weight: 700;">{{ $myOrderCount ?? 0 }} My Orders</h3>
                <p style="margin: 0 0 18px; color: rgba(255, 255, 255, 0.82);">Review your current food orders and track their progress.</p>
                <a href="{{ route('Order.Status') }}" style="display: inline-flex; align-items: center; padding: 10px 16px; border-radius: 999px; background: #fff; color: #1d4ed8; font-weight: 700; text-decoration: none;">View Order Status</a>
            </div>

            <div style="background: linear-gradient(135deg, #0f766e 0%, #115e59 100%); color: #fff; border-radius: 20px; padding: 24px; box-shadow: 0 18px 36px rgba(15, 118, 110, 0.2);">
                <span style="display: inline-block; padding: 6px 12px; border-radius: 999px; background: rgba(255, 255, 255, 0.16); font-size: 12px; text-transform: uppercase; letter-spacing: 0.08em;">Bookings</span>
                <h3 style="margin: 16px 0 8px; font-size: 1.6rem; font-weight: 700;">{{ $myBookingCount ?? 0 }} My Bookings</h3>
                <p style="margin: 0 0 18px; color: rgba(255, 255, 255, 0.82);">Manage your table reservations, reschedule them, or remove them when plans change.</p>
                <a href="{{ route('bookings.index') }}" style="display: inline-flex; align-items: center; padding: 10px 16px; border-radius: 999px; background: #fff; color: #0f766e; font-weight: 700; text-decoration: none;">View My Bookings</a>
            </div>
        </div>
    </div>
</x-app-layout>
