@extends('admin.maindesign')

@section('show_orders')
<style>
    .orders-panel {
        margin: 18px;
        padding: 24px;
        background: #2d3035;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 18px;
        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.22);
    }

    .orders-title {
        margin: 0 0 8px;
        color: #fff;
        font-size: 1.4rem;
        font-weight: 700;
    }

    .orders-subtitle {
        margin: 0 0 18px;
        color: #9ca3af;
        font-size: 0.95rem;
    }

    .orders-alert {
        margin-bottom: 18px;
        padding: 12px 14px;
        border-radius: 12px;
        color: #fff;
        font-weight: 600;
        text-align: center;
    }

    .orders-alert-danger {
        background: rgba(220, 53, 69, 0.85);
    }

    .orders-table-wrap {
        overflow-x: auto;
        border-radius: 14px;
    }

    .orders-table {
        width: 100%;
        min-width: 1100px;
        border-collapse: collapse;
        background: #25282d;
        color: #e5e7eb;
    }

    .orders-table thead th {
        padding: 16px 14px;
        background: #f8fafc;
        color: #6b7280;
        font-size: 0.9rem;
        font-weight: 700;
        letter-spacing: 0.02em;
        text-align: left;
        white-space: nowrap;
    }

    .orders-table tbody td {
        padding: 16px 14px;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        vertical-align: middle;
    }

    .orders-table tbody tr:hover {
        background: rgba(255, 255, 255, 0.03);
    }

    .orders-customer strong {
        display: block;
        color: #fff;
        font-size: 0.98rem;
    }

    .orders-customer span,
    .orders-muted {
        color: #9ca3af;
        font-size: 0.9rem;
    }

    .orders-food-image {
        width: 120px;
        height: 120px;
        border-radius: 18px;
        object-fit: cover;
        border: 2px solid rgba(255, 255, 255, 0.12);
        background: #1f2937;
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.24);
    }

    .orders-no-image {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 120px;
        height: 120px;
        border-radius: 18px;
        background: #374151;
        color: #d1d5db;
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }

    .orders-status {
        display: inline-flex;
        align-items: center;
        padding: 6px 12px;
        border-radius: 999px;
        background: rgba(245, 158, 11, 0.16);
        color: #fbbf24;
        font-size: 0.82rem;
        font-weight: 700;
        text-transform: capitalize;
        white-space: nowrap;
    }

    .orders-actions {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .orders-action-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 14px;
        border-radius: 10px;
        font-size: 0.9rem;
        font-weight: 600;
        text-decoration: none;
    }

    .orders-action-link-update {
        background: #e0ecff;
        color: #2563eb;
    }

    .orders-action-link-delete {
        background: #fee2e2;
        color: #dc2626;
    }

    .orders-action-link-success {
        background: #dcfce7;
        color: #166534;
    }

    .orders-empty {
        padding: 32px 20px;
        color: #d1d5db;
        text-align: center;
    }
</style>

<div class="orders-panel">
    <h2 class="orders-title">Customer Orders</h2>
    <p class="orders-subtitle">Review placed orders, quantities, pricing, and current status in one place.</p>

    @if(session('danger'))
        <div class="orders-alert orders-alert-danger">
            {{ session('danger') }}
        </div>
    @endif

    <div class="orders-table-wrap">
        <table class="orders-table">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Customer Email</th>
                    <th>Customer Address</th>
                    <th>Customer Phone</th>
                    <th>Food Name</th>
                    <th>Food Type</th>
                    <th>Food Image</th>
                    <th>Food Price</th>
                    <th>Food Quantity</th>
                    <th>Order Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->customer_name }}</td>
                        <td class="orders-muted">{{ $order->customer_email }}</td>
                        <td class="orders-muted">{{ $order->customer_Address }}</td>
                        <td class="orders-muted">{{ $order->customer_phone }}</td>
                        <td>{{ $order->Food_name }}</td>
                        <td>{{ $order->Food_type }}</td>
                        <td>
                            @if($order->Food_image)
                                <img src="{{ asset('food_img/' . $order->Food_image) }}" alt="{{ $order->Food_name }}" class="orders-food-image">
                            @else
                                <span class="orders-no-image">No image</span>
                            @endif
                        </td>
                        <td>${{ number_format($order->Food_price, 2) }}</td>
                        <td>{{ $order->Food_quantity }}</td>
                        <td>
                            <span class="orders-status">{{ $order->order_status }}</span>
                        </td>
                        <td>
                            <div class="orders-actions">
                                <a href="{{ route('admin.delivered', $order->id) }}" class="orders-action-link orders-action-link-success">Delivered</a>
                                <a href="{{ route('admin.cancel', $order->id) }}" class="orders-action-link orders-action-link-delete">Cancel</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="orders-empty">No orders have been placed yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
