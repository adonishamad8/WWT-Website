<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Package;
use App\Tag;
use File;
use Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
	protected $categories;

    public function __construct()
    {
        $this->categories = Category::all();
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::with('categories')->get();
		return view('admin.packages.index', ['packages' => $packages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.packages.create', ['categories' => $this->categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
		
		

		$pdf = $request->file('pdf');
        $input['pdf'] = $pdf;
		
		$pdfTitle = str_replace(' ', '-', $request->name);
		
		// Available alpha caracters
		$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

		// generate a pin based on 2 * 7 digits + a random character
		$pin = mt_rand(1000000, 9999999)
			. mt_rand(1000000, 9999999)
			. $characters[rand(0, strlen($characters) - 1)];

		// shuffle the result
		$pdfName = $pdfTitle.'-'.str_shuffle($pin);
		
		$input['pdf_name'] = $pdfName;
		
        $package = Package::create($input);
		
		$package->categories()->sync($request->categories);
		
		if(!$request->get('published'))
            $request['published'] = 0;
		
		if(!$request->get('featured'))
            $request['featured'] = 0;
		
		if(!$request->get('is_video'))
            $request['is_video'] = 0;
				
		// Add Image
		if ($request->image) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $package
                ->addMedia($request->image)
                ->setFileName("package-".$package->id.'.'.$ext)
                ->toMediaCollection('package');
        }
		
		// Add multiple images
        foreach ($request->input('gallery_image', []) as $file) {
            $package->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
        }
		
		//Tags
        $tags = explode(",", $request['tags']);
        $tagIds = [];
        foreach($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            array_push($tagIds, $tag->id);
        }
        $package->tags()->sync($tagIds);
		

		if(!empty($pdf)){
			$fileName = $pdfName.'.'.$request->file('pdf')->extension();
			$request->file('pdf')->move(public_path('uploads'), $fileName);
		}
		
		session()->flash('message', 'Your record has been added successfully');
		return redirect(route('packages.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        return view('admin.packages.edit', ['package' => $package, 'categories' => $this->categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        if(!$request->get('published'))
            $request['published'] = 0;
		
		if(!$request->get('featured'))
            $request['featured'] = 0;
		
		if(!$request->get('is_video'))
            $request['is_video'] = 0;
		
		if($request->has('delete_existing_image')){
            $package->clearMediaCollection('package');
			session()->flash('message', 'Image has been successfully deleted');
            return redirect()->back();
        }

		if (isset($request->image)) {
			$package->clearMediaCollection('package');
            $ext = $request->file('image')->getClientOriginalExtension();
            $package
                ->addMedia($request->image)
                ->setFileName("package-".$package->id.'.'.$ext)
                ->toMediaCollection('package');
        }
		
		// Remove media files removed by the user on edit package
        if ($package->getMedia('gallery')->count()) {
            foreach ($package->getMedia('gallery') as $media) {
                if (!in_array($media->file_name, $request->input('gallery_image', []))) {
                    $media->delete();
                }
            }
        }
		
		// Add media file added by the user on edit package
        $media = $package->getMedia('gallery')->pluck('file_name')->toArray();
        foreach ($request->input('gallery_image', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $package->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
            }
        }
		
		$tags = explode(",", $request['tag_list']);
        $tagIds = [];
        foreach($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            array_push($tagIds, $tag->id);
        }

        // attach tags to package
        $package->tags()->sync($tagIds);
		
		$package->categories()->sync($request->categories);
		
		
		if($request->has('delete_existing_pdf')){
            if(\File::exists(public_path("uploads/" . $package->pdf_name . ".pdf"))){
                \File::delete(public_path("uploads/" . $package->pdf_name . ".pdf"));
            }
        }

        if($request->has('pdf')){
            if(\File::exists(public_path("uploads/" . $package->pdf_name . ".pdf"))){
                \File::delete(public_path("uploads/" . $package->pdf_name . ".pdf"));
            }
            $fileName = $package->pdf_name.'.'.$request->file('pdf')->extension();
            $request->file('pdf')->move(public_path('uploads'), $fileName);
        }
		
		$package->update($request->all());
		session()->flash('message', 'Your record has been updated successfully');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $package->delete();

        if(\File::exists(public_path("uploads/" . $package->pdf_name . ".pdf"))){
            \File::delete(public_path("uploads/" . $package->pdf_name . ".pdf"));
        }
		
		session()->flash('message', 'Your record has been deleted successfully');
		return redirect(route('packages.index'));
    }
	
	/**
     * Handles multiple image updoad.
     * 
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function storeMedia(Request $request)
    {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name'          => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }
	
	public function downloadPdf($pdf_name)
	{
        $file="uploads/" . $pdf_name . ".pdf";

        if ($file){
            return Response::download($file);
        }
		else{
            return false;
        }
    }
}