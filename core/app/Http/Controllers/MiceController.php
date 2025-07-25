<?php

namespace App\Http\Controllers;

use App;
use App\Mice;
use App\Category;
use Illuminate\Http\Request;

class MiceController extends Controller
{
    public function index()
    {	
		$mices = Mice::where('published', '1')->limit(1)->get();
		$categories = Category::all();
		
        return view('front.mice', ['mices' => $mices, 'categories' => $categories]);
    }
}
