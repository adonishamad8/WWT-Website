<?php

namespace App\Http\Controllers;

use App;
use App\Event;
use App\Category;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
		$events = Event::orderBy('date', 'DESC')->where('published', '1')->get();
		$categories = Category::orderBy('order', 'ASC')->where('published', '1')->get();
		
        return view('front.events', ['categories' => $categories, 'events' => $events]);
    }
	
	public function show($id, $slug)
    {
		$event = Event::find($id);
		$categories = Category::orderBy('order', 'ASC')->where('published', '1')->get();
		
		if($event != null && $slug == $event->slug){
			return view('front.event-details', ['categories' => $categories, 'event' => $event]);
		}
		else{
			abort(404);
		}
	}
}
