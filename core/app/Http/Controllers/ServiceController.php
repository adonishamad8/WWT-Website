<?php

namespace App\Http\Controllers;

use App;
use App\Service;
use App\Category;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
		$categories = Category::all();
		$services = Service::where('published', '1')->get();

        return view('front.products', ['services' => $services, 'categories' => $categories]);
    }
	
	public function show($id, $slug)
    {
		$categories = Category::all();
		$service = Service::find($id);
		$services = Service::where('published', '1')->get();
		
		if($service != null && $slug == $service->slug){
			return view('front.service-details', ['services' => $services, 'service' => $service, 'categories' => $categories]);
		}
		else{
			abort(404);
		}
    }

}
