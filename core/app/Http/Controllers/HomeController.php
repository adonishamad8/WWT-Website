<?php

namespace App\Http\Controllers;

use App;
use App\Slider;
use App\Category;
use App\Review;
use App\Service;
use App\Event;
use App\Package;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
		$sliders = Slider::orderBy('order', 'ASC')->where('published', '1')->get();
		$categories = Category::orderBy('order', 'ASC')->where('published', '1')->get();
		$cats = Category::orderBy('order', 'ASC')->where('published', '1')->get();
		$services = Service::where('published', '1')->limit(4)->get();
		$packages = Package::orderBy('order', 'ASC')->where('featured', '1')->where('published', '1')->get();
		$events = Event::orderBy('date', 'DESC')->limit(2)->where('published', '1')->get();
		$reviews = Review::orderBy('order', 'ASC')->where('published', '1')->get();

        return view('front.index', ['sliders' => $sliders, 'categories' => $categories, 'cats' => $cats, 'services' => $services, 'packages' => $packages, 'events' => $events, 'reviews' => $reviews]);
    }
}
