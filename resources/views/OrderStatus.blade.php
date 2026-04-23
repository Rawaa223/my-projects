<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Status') }}
        </h2>
    </x-slot>

    <div style="padding: 24px;">
        <div style="background: #ffffff; border: 1px solid #e5e7eb; border-radius: 18px; overflow: hidden; box-shadow: 0 14px 30px rgba(15, 23, 42, 0.08);">
            <div style="padding: 24px; border-bottom: 1px solid #e5e7eb;">
                <h3 style="margin: 0 0 8px; font-size: 1.4rem; font-weight: 700; color: #111827;">My Orders</h3>
                <p style="margin: 0; color: #6b7280;">Track your placed orders, quantities, prices, and current delivery status.</p>
            </div>

            <div style="overflow-x: auto;">
                <table style="width: 100%; min-width: 980px; border-collapse: collapse; font-family: Arial, sans-serif;">
                    <thead>
                        <tr style="background-color: #f8fafc;">
                            <th style="border-bottom: 1px solid #e5e7eb; padding: 16px; color: #6b7280; text-align: left;">Your Name</th>
                            <th style="border-bottom: 1px solid #e5e7eb; padding: 16px; color: #6b7280; text-align: left;">Your Email</th>
                            <th style="border-bottom: 1px solid #e5e7eb; padding: 16px; color: #6b7280; text-align: left;">Food Name</th>
                            <th style="border-bottom: 1px solid #e5e7eb; padding: 16px; color: #6b7280; text-align: left;">Food Image</th>
                            <th style="border-bottom: 1px solid #e5e7eb; padding: 16px; color: #6b7280; text-align: left;">Food Quantity</th>
                            <th style="border-bottom: 1px solid #e5e7eb; padding: 16px; color: #6b7280; text-align: left;">Food Price</th>
                            <th style="border-bottom: 1px solid #e5e7eb; padding: 16px; color: #6b7280; text-align: left;">Order Current Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($my_order as $order)
                            <tr>
                                <td style="border-bottom: 1px solid #e5e7eb; padding: 16px;">{{ $order->customer_name }}</td>
                                <td style="border-bottom: 1px solid #e5e7eb; padding: 16px;">{{ $order->customer_email }}</td>
                                <td style="border-bottom: 1px solid #e5e7eb; padding: 16px;">{{ $order->Food_name }}</td>
                                <td style="border-bottom: 1px solid #e5e7eb; padding: 16px; text-align: center;">
                                    @if($order->Food_image)
                                        <img src="{{ asset('food_img/' . $order->Food_image) }}" alt="{{ $order->Food_name }}" style="width: 88px; height: 88px; object-fit: cover; border-radius: 14px; border: 1px solid #d1d5db;">
                                    @else
                                        <span style="color: #9ca3af;">No image</span>
                                    @endif
                                </td>
                                <td style="border-bottom: 1px solid #e5e7eb; padding: 16px;">{{ $order->Food_quantity }}</td>
                                <td style="border-bottom: 1px solid #e5e7eb; padding: 16px;">${{ number_format($order->Food_price, 2) }}</td>
                                <td style="border-bottom: 1px solid #e5e7eb; padding: 16px;">
                                    <span style="display: inline-flex; align-items: center; padding: 6px 12px; border-radius: 999px; background: rgba(245, 158, 11, 0.14); color: #b45309; font-size: 0.85rem; font-weight: 700; text-transform: capitalize;">
                                        {{ $order->order_status }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="padding: 32px 20px; text-align: center; color: #6b7280;">
                                    You have not placed any orders yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
