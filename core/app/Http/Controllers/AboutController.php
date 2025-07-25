<?php

namespace App\Http\Controllers;

use App;
use App\About;
use App\Board;
use App\Service;
use App\Category;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
		$abouts = About::all();
		$services = Service::inRandomOrder()->where('published', '1')->limit(4)->get();
		$boards = Board::orderBy('order', 'ASC')->where('published', '1')->get();
		$categories = Category::orderBy('order', 'ASC')->where('published', '1')->get();

        return view('front.about', ['abouts' => $abouts, 'boards' => $boards, 'categories' => $categories, 'services' => $services]);
    }
}
