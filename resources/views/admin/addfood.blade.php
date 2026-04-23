@extends('admin.maindesign')

@section('addfood')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10">
            @if(session('success'))
                <div class="alert alert-success" style="border-radius: 16px; border: none; box-shadow: 0 12px 35px rgba(34, 197, 94, 0.18);">
                    {{ session('success') }}
                </div>
            @endif

            <div class="block" style="border-radius: 24px; overflow: hidden; background: linear-gradient(180deg, #172033 0%, #111827 100%); box-shadow: 0 24px 60px rgba(15, 23, 42, 0.35);">
                <div style="padding: 28px 32px; border-bottom: 1px solid rgba(148, 163, 184, 0.16);">
                    <span style="display: inline-block; padding: 6px 12px; border-radius: 999px; background: rgba(59, 130, 246, 0.18); color: #93c5fd; font-size: 12px; text-transform: uppercase; letter-spacing: 0.08em;">Food Section</span>
                    <h2 style="margin: 16px 0 8px; color: #f8fafc; font-size: 2rem;">Add New Food Item</h2>
                    <p style="margin: 0; color: #cbd5e1;">Fill in the menu details below to publish a new food item in the restaurant catalog.</p>
                </div>

                <form action="{{ route('admin.postaddfood') }}" method="POST" enctype="multipart/form-data" style="padding: 32px;">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="food_name" style="display: block; margin-bottom: 10px; color: #e2e8f0; font-weight: 600;">Food Name</label>
                            <input
                                id="food_name"
                                type="text"
                                name="food_name"
                                placeholder="e.g. Grilled Salmon"
                                required
                                style="width: 100%; padding: 14px 16px; border-radius: 14px; border: 1px solid rgba(148, 163, 184, 0.2); background: rgba(15, 23, 42, 0.75); color: #f8fafc; outline: none;"
                            >
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="food_price" style="display: block; margin-bottom: 10px; color: #e2e8f0; font-weight: 600;">Food Price</label>
                            <input
                                id="food_price"
                                type="number"
                                name="food_price"
                                placeholder="e.g. 25"
                                min="0"
                                step="1"
                                required
                                style="width: 100%; padding: 14px 16px; border-radius: 14px; border: 1px solid rgba(148, 163, 184, 0.2); background: rgba(15, 23, 42, 0.75); color: #f8fafc; outline: none;"
                            >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="food_type" style="display: block; margin-bottom: 10px; color: #e2e8f0; font-weight: 600;">Food Type</label>
                            <select
                                id="food_type"
                                name="food_type"
                                required
                                style="width: 100%; padding: 14px 16px; border-radius: 14px; border: 1px solid rgba(148, 163, 184, 0.2); background: rgba(15, 23, 42, 0.75); color: #f8fafc; outline: none;"
                            >
                                <option value="">Select Food Type</option>
                                <option value="Starters">Starters</option>
                                <option value="Salads">Salads</option>
                                <option value="Specialty">Specialty</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label for="food_image" style="display: block; margin-bottom: 10px; color: #e2e8f0; font-weight: 600;">Food Image</label>
                            <div style="padding: 10px 14px; border-radius: 14px; border: 1px dashed rgba(148, 163, 184, 0.35); background: rgba(15, 23, 42, 0.5);">
                                <input
                                    id="food_image"
                                    type="file"
                                    name="food_image"
                                    accept="image/*"
                                    required
                                    style="width: 100%; color: #cbd5e1;"
                                >
                                <small style="display: block; margin-top: 8px; color: #94a3b8;">Upload a clear image for the menu display.</small>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="food_details" style="display: block; margin-bottom: 10px; color: #e2e8f0; font-weight: 600;">Food Details</label>
                        <textarea
                            id="food_details"
                            name="food_details"
                            placeholder="Describe the ingredients, preparation, or serving style."
                            required
                            style="width: 100%; min-height: 180px; padding: 16px; border-radius: 18px; border: 1px solid rgba(148, 163, 184, 0.2); background: rgba(15, 23, 42, 0.75); color: #f8fafc; outline: none; resize: vertical;"
                        ></textarea>
                    </div>

                    <div class="d-flex flex-wrap justify-content-between align-items-center" style="gap: 16px; margin-top: 30px;">
                        <p style="margin: 0; color: #94a3b8;">Required fields: name, details, price, type, and image.</p>
                        <button
                            type="submit"
                            class="btn btn-primary"
                            style="padding: 12px 28px; border-radius: 999px; border: none; background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); box-shadow: 0 15px 30px rgba(37, 99, 235, 0.28);"
                        >
                            Add Food
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
