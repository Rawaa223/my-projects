<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodCart;
use App\Models\Orders;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\BookTable;

class UserController extends Controller
{
    public function index(): View
    {
        $foods = Food::all();

        return view('home', compact('foods'));
    }

    public function addToCart(Request $request): RedirectResponse|\Illuminate\Http\JsonResponse
    {
        if (! Auth::check()) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => '<strong style="font-size: 1.1rem; display: block; margin-bottom: 15px;">Please log in to add items to cart</strong><div class="auth-buttons-container"><a href="' . route('login') . '" class="btn-auth"><i class="fas fa-sign-in-alt"></i>Login</a><a href="' . route('register') . '" class="btn-auth"><i class="fas fa-user-plus"></i>Register</a></div>',
                    'redirect' => null
                ]);
            }
            return redirect()->route('login')->with('error', 'Please login to add items to cart.');
        }

        $food = Food::findOrFail($request->food_id);
        $cart = new FoodCart();
        $cart->userID = Auth::id();
        $cart->food_id = $food->id;
        $cart->food_name = $food->food_name;
        $cart->food_details = $food->food_details;
        $cart->food_image = $food->food_image;
        $cart->food_quantity = (int) $request->quantity;
        $food_price = $food->food_price ?? 0;
        $price = $cart->food_quantity * $food_price;
        $cart->food_price = $price;
        $cart->food_type = $food->food_type;
        $cart->save();

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Food Added To Cart Successfully!',
                'cart_count' => FoodCart::where('userID', Auth::id())->sum('food_quantity')
            ]);
        }

        return redirect()->back()->with('cart_message','Food Added To Cart Successfully!');
    }

    public function foodCart(): View
    {
        $current_auth = Auth::id();
        $cart_food_info = FoodCart::where('userID', '=', $current_auth)->get();

        return view('ShowCart', compact('cart_food_info'));
    }

    public function removeCart(Request $request, int $id): RedirectResponse
    {
        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $remove_food = FoodCart::whereKey($id)
            ->where('userID', Auth::id())
            ->firstOrFail();

        $quantityToRemove = min((int) $validated['quantity'], (int) $remove_food->food_quantity);

        if ($quantityToRemove < $remove_food->food_quantity) {
            $unitPrice = (int) round($remove_food->food_price / $remove_food->food_quantity);

            $remove_food->update([
                'food_quantity' => $remove_food->food_quantity - $quantityToRemove,
                'food_price' => max(0, $remove_food->food_price - ($unitPrice * $quantityToRemove)),
            ]);
        } else {
            $remove_food->delete();
        }

        return redirect()->back();
    }

    public function confirmOrderCart(Request $request): RedirectResponse
    {
        $current_user = Auth::id();
        $cart_food = FoodCart::where('userID', '=', $current_user)->get();

        foreach ($cart_food as $cart_foods) {
            $single_order = new Orders();
            $single_order->customer_id=Auth::user()->id;
            $single_order->customer_name = Auth::user()->name;
            $single_order->customer_email = Auth::user()->email;
            $single_order->customer_Address = Auth::user()->address;
            $single_order->customer_phone = Auth::user()->phone;
            $single_order->Food_name = $cart_foods->food_name;
            $single_order->Food_type = $cart_foods->food_type;
            $single_order->Food_image = $cart_foods->food_image;
            $single_order->Food_price = $cart_foods->food_price;
            $single_order->Food_quantity = $cart_foods->food_quantity;
            $single_order->save();
        }

        return redirect()->back()->with('confirm_order', 'Order Confirmed Successfully!');
    }





    



    public function gofile(): View
    {
        return view('admin.adminfile');
    }

    public function home(): View
    {
        if (Auth::id() && Auth::user()->usertype == 'admin') {
            return view('admin.dashboard', [
                'foodCount' => Food::count(),
                'orderCount' => Orders::count(),
                'bookedTableCount' => BookTable::count(),
            ]);
        }

        if (Auth::id() && Auth::user()->usertype == 'user') {
            return view('dashboard', [
                'myOrderCount' => Orders::where('customer_id', Auth::id())->count(),
                'myBookingCount' => BookTable::where('customer_id', Auth::id())->count(),
            ]);
        }

        abort(403, 'Unauthorized Access');
    }
    public function bookTable(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'time' => ['required'],
            'guest_number' => ['required', 'integer', 'min:1', 'max:20'],
            'message' => ['nullable', 'string'],
        ]);

        $book = new BookTable();
        $book->customer_id = Auth::id();
        $book->name = $validated['name'];
        $book->email = $validated['email'];
        $book->phone = $validated['phone'];
        $book->date = $validated['date'];
        $book->time = $validated['time'];
        $book->guest_number = $validated['guest_number'];
        $book->message = $validated['message'] ?? null;
        $book->save();

        return redirect(url()->previous() . '#book-a-table')
            ->with('booking_message', 'Table request sent!');
    }

    public function viewOrders(): View
    {
        $current_auth = Auth::id();
        $my_order = Orders::where('customer_id', '=', $current_auth)->get();

        return view('OrderStatus', compact('my_order'));
    }

    public function viewBookings(): View
    {
        $myBookings = BookTable::where('customer_id', Auth::id())
            ->latest()
            ->get();

        return view('MyBookings', compact('myBookings'));
    }

    public function editBooking(int $id): View
    {
        $booking = BookTable::whereKey($id)
            ->where('customer_id', Auth::id())
            ->firstOrFail();

        return view('EditBooking', compact('booking'));
    }

    public function updateBooking(Request $request, int $id): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'time' => ['required'],
            'guest_number' => ['required', 'integer', 'min:1', 'max:20'],
            'message' => ['nullable', 'string'],
        ]);

        $booking = BookTable::whereKey($id)
            ->where('customer_id', Auth::id())
            ->firstOrFail();

        $booking->update($validated);

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking updated successfully.');
    }

    public function deleteBooking(int $id): RedirectResponse
    {
        $booking = BookTable::whereKey($id)
            ->where('customer_id', Auth::id())
            ->firstOrFail();

        $booking->delete();

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking removed successfully.');
    }
}
