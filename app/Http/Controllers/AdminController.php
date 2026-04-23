<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Food;
use App\Models\Orders;
use App\Models\BookTable;

class AdminController extends Controller
{
    //
    public function addFood(){
        return view('admin.addfood');
    }

    public function postAddFood(Request $request){
        $food = new Food();

        $food->food_name=$request->food_name;

        $food->food_details=$request->food_details;

        $image=$request->food_image; //yamin.jpg

        if($image=$request->file('food_image')){
            
        $imagename=time().'.'.$image->getClientOriginalExtension();
            //255.jpg
        $food->food_image=$imagename;

        }
        $food->food_price=$request->food_price;

        $food->food_type=$request->food_type;

        $food->save();

        if($image=$request->food_image && $food->save()){
            $request->food_image->move('food_img',$imagename);
        }
        return redirect()->back()->with('success','Food Added Successfully');
    }
    public function showFood(){
        $foods=Food::all();
        return view('admin.showfood',compact('foods'));
        
    }
    public function deleteFood($id){
        $food=Food::findOrFail($id);
        $food->delete();
        return redirect()->back()->with('danger','Food Deleted Successfully!');
    }
     public function updateFood($id){
        $food=Food::findOrFail($id);
        return view('admin.updatefood',compact('food'));

    }
    public function postUpdateFood(Request $request,$id){
        $food = Food::findOrFail($id);

        $food->food_name=$request->food_name;

        $food->food_details=$request->food_details;

        $image=$request->food_image; 

        if($image=$request->file('food_image')){
            
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $food->food_image=$imagename;

        }
        $food->food_price=$request->food_price;

        $food->food_type=$request->food_type;

        $food->save();

        if($image=$request->food_image && $food->save()){
            $request->food_image->move('food_img',$imagename);
        }
        return redirect()->back()->with('update','Food Updated Successfully');
    }
    public function viewOrders(){
        $orders=Orders::all();
        return view('admin.vieworders',compact('orders'));
    }
    public function foodStatusDelivered($id){
        $order= Orders::findOrFail($id);
        $order->order_status='Delivered';
        $order->save();
        return redirect()->back();
}
    public function foodStatusCancelled($id){
        $order= Orders::findOrFail($id);
        $order->order_status='Cancelled';
        $order->save();
        return redirect()->back();
    }

     public function viewBookedTable(){
        $bookedTables=BookTable::all();
        return view('admin.showbookedtable',compact('bookedTables'));
     }
}