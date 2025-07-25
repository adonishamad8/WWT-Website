<?php

namespace App\Http\Controllers;

use Mail;
use App;
use App\Category;
use Illuminate\Http\Request;
use App\Mail\SendMail;

class ContactController extends Controller
{
    public function index()
    {		
		$categories = Category::all();
		
        return view('front.contact', ['categories' => $categories]);
    }
	
	public function store(Request $request)
	{
		$this->validate($request, [
			'fname' => 'required',
			'lname' => 'required',
			'email' => 'required|email',
			'phone' => 'required',
		]);
		
		$data = array(
				'fname' => $request->fname,
				'lname' => $request->lname,
				'email' => $request->email,
				'phone' => $request->phone,
				'message' => $request->message,
		);
		
		Mail::to('info@worldwidetravel-lb.com')->send(new SendMail($data));
		
		return response()->json(['success' => ' Message has been sent'], 200);
    }
}
