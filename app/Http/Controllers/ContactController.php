<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(){

    return view ('Contact Us');
    
}


public function contactPost(Request $request){
    $request->validate([
    'name' => 'required',
    'email' => 'required|email',
    'subject' => 'required',
    'message' => 'required',
]);
   Mail::raw($request->message, function ($message) use ($request) {
    $message->to("contact@restaurantly.com")
            ->subject($request->subject) // ✅ use subject from form
            ->from($request->email, $request->name);
});
return redirect()->back()->with('success_message', 'Your message has been sent successfully!')->withFragment('contact');}
}