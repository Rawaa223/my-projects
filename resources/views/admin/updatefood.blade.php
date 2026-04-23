@extends('admin.maindesign')
<base href="/public">

@section('update_food')

<div class="bg-blue-600 px-6 py-4" style="text-align: center;">
    <h2 class="text-xl font-semibold text-white">Update Food Item</h2>
</div>
<div class="p-2">

    @if(session('update'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            {{ session('update') }}
        </div>
    @endif

    <form action="{{route('admin.postupdatefood',$food->id)}}" method="POST" enctype="multipart/form-data" 
        style="display: flex; flex-direction: column; margin-left: 600px; gap: 10px; height: 100vh; width: 400px;">
        @csrf

        <input type="text" name="food_name" value="{{$food->food_name}}"style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        <br><br>

        <textarea name="food_details" 
            style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; min-height: 200px;">{{$food->food_details}}</textarea>
        <br><br>

        <input type="number" name="food_price" value="{{$food->food_price}}" min="0" step="1" required 
            style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        <br><br>

        <select name="food_type" required 
            style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            <option value="">Select Food Type</option>
            <option value="Starters" {{ $food->food_type == 'Starters' ? 'selected' : '' }}>Starters</option>
            <option value="Salads" {{ $food->food_type == 'Salads' ? 'selected' : '' }}>Salads</option>
            <option value="Specialty" {{ $food->food_type == 'Specialty' ? 'selected' : '' }}>Specialty</option>
        </select>
        <br><br>

        <div>
            <h3>Old Image</h3>
            <img style ="width: 100px;" src="{{asset('food_img/'.$food->food_image)}}" alt="">
        </div>
        <label style="background-color:greenyellow;"
        for="updateimge">update image from here!</label>
        <input type="file" name="food_image" accept="image/*"
        style="padding: 8px;">
        <button type="submit" style="padding: 8px 16px;
         background: #4CAF50; color: white; border: none;
          border-radius: 4px; cursor: pointer;">Update Food</button>

    </form>
</div>
@endsection