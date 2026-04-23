@extends('main')




@section('content')
<style>
.confirm-order:hover {
    background: linear-gradient(135deg, #d4b570 0%, #b89446 100%);
    box-shadow: 0 6px 20px rgba(205, 164, 94, 0.5);
    transform: translateY(-2px);
}

.remove-quantity-input {
    width: 72px;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 6px;
}
</style>
<table style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; margin: 10px 0;">
    @if(session('danger'))
        <div style="background-color:rgb(240,16,0);color:white;text-align: center;">
            {{ session('danger') }}
        </div>
    @endif
      @if(session('confirm_order'))
        <div style="background-color:rgba(19, 161, 86, 0.67);text-align: center;">
            {{ session('confirm_order') }}
        </div>
    @endif
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="border: 1px solid #ddd; padding: 12px; color: #6d6868bb; text-align: left;">Food Name</th>
            <th style="border: 1px solid #ddd; padding: 12px; color: #6d6868bb; text-align: left;">Food Type</th>
            <th style="border: 1px solid #ddd; padding: 12px; color: #6d6868bb; text-align: left;">Food Details</th>
            <th style="border: 1px solid #ddd; padding: 12px; color: #6d6868bb; text-align: left;">Food Image</th>
            <th style="border: 1px solid #ddd; padding: 12px; color: #6d6868bb; text-align: left;">Food Quantity</th>
            <th style="border: 1px solid #ddd; padding: 12px; color: #6d6868bb; text-align: left;">Food Price</th>
            <th style="border: 1px solid #ddd; padding: 12px; color: #6d6868bb; text-align: left;">Actions</th>

        </tr>
    </thead>
    <tbody>
        @php 
             $total_price = 0;
        @endphp


        @foreach($cart_food_info as $user_cart_foods)
        <tr style="border-bottom: 1px solid #ddd;">
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $user_cart_foods->food_name }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $user_cart_foods->food_type }}</td>
            <td style="border: 1px solid #ddd; padding: 8px;">{{ $user_cart_foods->food_details }}</td>
            <td style="border: 1px solid #ddd; padding: 8px; text-align: center;">
                @if($user_cart_foods->food_image)
                    <img src="{{ asset('food_img/' . $user_cart_foods->food_image) }}" alt="{{ $user_cart_foods->food_image }}" style="max-width: 100px; max-height: 100px;">
                @endif
            </td>
             <td style="border: 1px solid #ddd; padding: 8px;">{{ $user_cart_foods->food_quantity }}</td>

            <td style="border: 1px solid #ddd; padding: 8px;">${{ number_format($user_cart_foods->food_price, 2) }}</td>

            <td style="border: 1px solid #ddd; padding: 8px;">
                <form action="{{ route('delete.cart', $user_cart_foods->id) }}" method="POST" onsubmit="return confirm('Remove the selected quantity from this item?');" style="display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
                    @csrf
                    @method('DELETE')
                    <label for="remove_quantity_{{ $user_cart_foods->id }}" style="font-weight: 600;">Qty</label>
                    <input
                        id="remove_quantity_{{ $user_cart_foods->id }}"
                        type="number"
                        name="quantity"
                        value="1"
                        min="1"
                        max="{{ $user_cart_foods->food_quantity }}"
                        class="remove-quantity-input"
                    >
                    <button type="submit" style="color: white; text-decoration: none; padding: 8px 16px; border-radius: 6px; background-color: #dc3545; border: none; cursor: pointer; font-weight: bold; transition: background-color 0.3s;">
                        Remove
                    </button>
                </form>
            </td>
        </tr>
        @php
            $total_price =$total_price+$user_cart_foods->food_price;
        @endphp
        @endforeach

    </tbody>
</table>
<h1>Total Price is : ${{ number_format($total_price, 2) }}</h1>
<form action="{{route('cart.confirm')}}" method="POST">
    @csrf
    <button type="submit" class="confirm-order" style="padding: 12px 28px; background: linear-gradient(135deg, #cda45e 0%, #a0823a 100%); color: white; border: none; border-radius: 4px; font-weight: 700; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 1px; cursor: pointer; transition: all 0.3s ease; text-decoration: none; display: inline-flex; align-items: center; justify-content: center; gap: 8px; min-height: 44px; box-shadow: 0 4px 15px rgba(205, 164, 94, 0.3);">
        Confirm Order
    </button>
</form>
@endsection

