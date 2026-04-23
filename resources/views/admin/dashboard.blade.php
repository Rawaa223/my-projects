

@extends('admin.maindesign')
@section('admindashboard')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="block" style="border-radius: 20px; overflow: hidden; background: linear-gradient(135deg, #1f2937 0%, #111827 100%);">
                <div class="title">
                    <strong class="d-block" style="font-size: 1.8rem; color: #f8fafc;">Admin Dashboard</strong>
                    <span style="color: #cbd5e1;">Manage food items and table reservations from one place.</span>
                </div>
                <div class="row mt-4">
                    <div class="col-md-4 mb-3">
                        <div style="background: rgba(248, 250, 252, 0.08); border: 1px solid rgba(248, 250, 252, 0.12); border-radius: 18px; padding: 20px;">
                            <span style="display: inline-block; background: rgba(34, 197, 94, 0.18); color: #86efac; padding: 6px 12px; border-radius: 999px; font-size: 12px; letter-spacing: 0.08em; text-transform: uppercase;">Food Section</span>
                            <h3 style="margin: 18px 0 8px; color: #ffffff;">Add Food</h3>
                            <p style="color: #cbd5e1;">Create a new menu item with image, details, type, and price.</p>
                            <a href="{{ route('admin.addfood') }}" class="btn btn-success" style="border-radius: 999px; padding: 10px 18px;">Open Add Food</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div style="background: rgba(248, 250, 252, 0.08); border: 1px solid rgba(248, 250, 252, 0.12); border-radius: 18px; padding: 20px;">
                            <span style="display: inline-block; background: rgba(59, 130, 246, 0.18); color: #93c5fd; padding: 6px 12px; border-radius: 999px; font-size: 12px; letter-spacing: 0.08em; text-transform: uppercase;">View Food</span>
                            <h3 style="margin: 18px 0 8px; color: #ffffff;">{{ $foodCount }} Food Items</h3>
                            <p style="color: #cbd5e1;">Review, update, and remove the food items currently available.</p>
                            <a href="{{ route('admin.showfood') }}" class="btn btn-primary" style="border-radius: 999px; padding: 10px 18px;">View Food List</a>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div style="background: rgba(248, 250, 252, 0.08); border: 1px solid rgba(248, 250, 252, 0.12); border-radius: 18px; padding: 20px;">
                            <span style="display: inline-block; background: rgba(245, 158, 11, 0.18); color: #fcd34d; padding: 6px 12px; border-radius: 999px; font-size: 12px; letter-spacing: 0.08em; text-transform: uppercase;">Booked Tables</span>
                            <h3 style="margin: 18px 0 8px; color: #ffffff;">{{ $bookedTableCount }} Reservations</h3>
                            <p style="color: #cbd5e1;">Check upcoming table bookings and reservation messages from customers.</p>
                            <a href="{{ route('admin.viewbookedtable') }}" class="btn btn-warning" style="border-radius: 999px; padding: 10px 18px; color: #111827;">View Booked Tables</a>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6 mb-3">
                        <div class="d-flex justify-content-between align-items-center" style="background: rgba(15, 23, 42, 0.45); border-radius: 16px; padding: 18px 20px;">
                            <div>
                                <span style="display: block; color: #94a3b8; font-size: 13px; text-transform: uppercase; letter-spacing: 0.08em;">Total Orders</span>
                                <strong style="font-size: 2rem; color: #ffffff;">{{ $orderCount }}</strong>
                            </div>
                            <a href="{{ route('admin.vieworders') }}" class="btn btn-outline-light" style="border-radius: 999px;">View Orders</a>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex justify-content-between align-items-center" style="background: rgba(15, 23, 42, 0.45); border-radius: 16px; padding: 18px 20px;">
                            <div>
                                <span style="display: block; color: #94a3b8; font-size: 13px; text-transform: uppercase; letter-spacing: 0.08em;">Quick Access</span>
                                <strong style="font-size: 1.1rem; color: #ffffff;">Food management and reservation review</strong>
                            </div>
                            <a href="{{ route('admin.showfood') }}" class="btn btn-outline-info" style="border-radius: 999px;">Manage Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
