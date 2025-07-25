<?php

namespace App\Http\Controllers;

use Mail;
use App;
use App\Package;
use App\Category;
use Illuminate\Http\Request;
use App\Mail\PackageMail;

class PackageController extends Controller
{
    public function index(Request $request)
    {
		$id = $request->id;
		$categories = Category::all();
		$category = Category::find($id);
		$packages = Package::with(['categories'])->whereHas('categories')->where('published', '1')->get();

        return view('front.packages', ['category' => $category, 'categories' => $categories, 'packages' => $packages]);
    }
	
	public function show($id, $slug)
    {
		$categories = Category::all();
		$package = Package::find($id);
		
		if($package != null && $slug == $package->slug){
			return view('front.package-details', ['package' => $package, 'categories' => $categories]);
		}
		else{
			abort(404);
		}
    }
	
	public function downloadBrochure($pdf_name)
	{
        $file="uploads/" . $pdf_name . ".pdf";

        if ($file){
            return redirect($file);
        }
		else{
            return false;
        }
    }
	
	public function store(Request $request)
	{
		$this->validate($request, [
			'packagename' => 'required',
			'country' => 'required',
			'price' => 'required',
			'fname' => 'required',
			'email' => 'required|email',
			'phone' => 'required',
			'checkin' => 'required',
			'checkout' => 'required',
		]);
		
		$data = array(
				'packagename' => $request->packagename,
				'country' => $request->country,
				'price' => $request->price,
				'fname' => $request->fname,
				'email' => $request->email,
				'phone' => $request->phone,
				'checkin' => $request->checkin,
				'checkout' => $request->checkout,
				'adultNb' => $request->adultNb,
				'childrenNb' => $request->childrenNb,
		);
		
		Mail::to('tours@worldwidetravel-lb.com')->send(new PackageMail($data));
		
		return response()->json(['success' => ' Application has been sent'], 200);
    }
}
