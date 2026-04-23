@extends('admin.maindesign')

@section('show_food')
<style>
    .admin-panel {
        margin: 18px;
        padding: 24px;
        background: #2d3035;
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 18px;
        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.22);
    }

    .admin-panel-title {
        margin: 0 0 8px;
        color: #fff;
        font-size: 1.4rem;
        font-weight: 700;
    }

    .admin-panel-subtitle {
        margin: 0 0 18px;
        color: #9ca3af;
        font-size: 0.95rem;
    }

    .admin-alert {
        margin-bottom: 18px;
        padding: 12px 14px;
        border-radius: 12px;
        color: #fff;
        font-weight: 600;
        text-align: center;
    }

    .admin-alert-danger {
        background: rgba(220, 53, 69, 0.85);
    }

    .admin-table-wrap {
        overflow-x: auto;
        border-radius: 14px;
    }

    .admin-table {
        width: 100%;
        min-width: 980px;
        border-collapse: collapse;
        background: #25282d;
        color: #e5e7eb;
    }

    .admin-table thead th {
        padding: 16px 14px;
        background: #f8fafc;
        color: #6b7280;
        font-size: 0.9rem;
        font-weight: 700;
        text-align: left;
        white-space: nowrap;
    }

    .admin-table tbody td {
        padding: 16px 14px;
        border-top: 1px solid rgba(255, 255, 255, 0.08);
        vertical-align: middle;
    }

    .admin-table tbody tr:hover {
        background: rgba(255, 255, 255, 0.03);
    }

    .admin-food-image {
        width: 96px;
        height: 96px;
        border-radius: 18px;
        object-fit: cover;
        border: 2px solid rgba(255, 255, 255, 0.12);
        background: #1f2937;
    }

    .admin-no-image {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 96px;
        height: 96px;
        border-radius: 18px;
        background: #374151;
        color: #d1d5db;
        font-size: 0.82rem;
        font-weight: 700;
        text-transform: uppercase;
    }

    .admin-actions {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .admin-action-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 14px;
        border-radius: 10px;
        font-size: 0.9rem;
        font-weight: 600;
        text-decoration: none;
    }

    .admin-action-link-update {
        background: #e0ecff;
        color: #2563eb;
    }

    .admin-action-link-delete {
        background: #fee2e2;
        color: #dc2626;
    }

    .admin-empty {
        padding: 32px 20px;
        color: #d1d5db;
        text-align: center;
    }
</style>

<div class="admin-panel">
    <h2 class="admin-panel-title">Food Menu Items</h2>
    <p class="admin-panel-subtitle">Review current menu entries, pricing, categories, and quick actions from one table.</p>

    @if(session('danger'))
        <div class="admin-alert admin-alert-danger">
            {{ session('danger') }}
        </div>
    @endif

    <div class="admin-table-wrap">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Food Name</th>
                    <th>Food Type</th>
                    <th>Food Details</th>
                    <th>Food Image</th>
                    <th>Food Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($foods as $food)
                    <tr>
                        <td>{{ $food->food_name }}</td>
                        <td>{{ $food->food_type }}</td>
                        <td>{{ $food->food_details }}</td>
                        <td>
                            @if($food->food_image)
                                <img src="{{ asset('food_img/' . $food->food_image) }}" alt="{{ $food->food_name }}" class="admin-food-image">
                            @else
                                <span class="admin-no-image">No image</span>
                            @endif
                        </td>
                        <td>${{ number_format($food->food_price, 2) }}</td>
                        <td>
                            <div class="admin-actions">
                                <a href="{{ route('admin.updatefood', $food->id) }}" class="admin-action-link admin-action-link-update">Update</a>
                                <a href="{{ route('admin.deletefood', $food->id) }}" onclick="return confirm('Are you sure you want to delete this food?');" class="admin-action-link admin-action-link-delete">Delete</a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="admin-empty">No food items have been added yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
