<?php

namespace App\Http\Controllers\Admin;

use App\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::all();
		return view('admin.abouts.index', ['abouts' => $abouts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.abouts.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		if(!$request->get('published'))
            $request['published'] = 0;
		
        $about = About::create($request->all());

		// Add Image
		if ($request->image) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $about
                ->addMedia($request->image)
                ->setFileName("about-".$about->id.'.'.$ext)
                ->toMediaCollection('about');
        }
        
		session()->flash('message', 'Your record has been added successfully');
		return redirect(route('abouts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        return view('admin.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
		if(!$request->get('published'))
            $request['published'] = 0;
		
		if($request->has('delete_existing_image')){
            $about->clearMediaCollection('about');
			session()->flash('message', 'Image has been successfully deleted');
            return redirect()->back();
        }
		
		if (isset($request->image)) {
			$about->clearMediaCollection('about');
            $ext = $request->file('image')->getClientOriginalExtension();
            $about
                ->addMedia($request->image)
                ->setFileName("about-".$about->id.'.'.$ext)
                ->toMediaCollection('about');
        }
		
		$about->update($request->all());
		session()->flash('message', 'Your record has been updated successfully');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
		$about->delete();
		session()->flash('message', 'Your record has been deleted successfully');
		return redirect(route('abouts.index'));
    }
}
