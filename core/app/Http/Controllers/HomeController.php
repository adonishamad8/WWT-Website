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
        // Sliders / categories / services
        $sliders    = Slider::orderBy('order', 'ASC')->where('published', '1')->get();
        $categories = Category::orderBy('order', 'ASC')->where('published', '1')->get();
        $cats       = Category::orderBy('order', 'ASC')->where('published', '1')->get();
        $services   = Service::where('published', '1')->limit(4)->get();

        // ✅ LATEST OVERALL PACKAGES (not grouped by category)
        // Pull only published packages, newest first, with media eager-loaded.
        // Adjust the take() number to how many you want in the slider.
        $packages = Package::where('published', '1')
            ->with('media')
            ->orderBy('id', 'DESC')   // or ->latest() if you prefer created_at
            ->take(12)
            ->get();

        // Events / reviews
        $events  = Event::orderBy('date', 'DESC')->where('published', '1')->limit(6)->get();
        $reviews = Review::orderBy('order', 'ASC')->where('published', '1')->get();

        return view('front.index', [
            'sliders'    => $sliders,
            'categories' => $categories,
            'cats'       => $cats,
            'services'   => $services,
            'packages'   => $packages,   // 👈 your Blade loops this
            'events'     => $events,
            'reviews'    => $reviews,
        ]);
    }
}
