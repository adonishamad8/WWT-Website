<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $sliders = Slider::all();
		return view('admin.sliders.index', ['sliders' => $sliders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create'); 
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
		
        $slider = Slider::create($request->all());

		// Add Image
		if ($request->image) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $slider
                ->addMedia($request->image)
                ->setFileName("slider-".$slider->id.'.'.$ext)
                ->toMediaCollection('slider');
        }
        
		session()->flash('message', 'Your record has been added successfully');
		return redirect(route('sliders.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        if(!$request->get('published'))
            $request['published'] = 0;
		
		if($request->has('delete_existing_image')){
            $slider->clearMediaCollection('slider');
			session()->flash('message', 'Image has been successfully deleted');
            return redirect()->back();
        }
		
		if (isset($request->image)) {
			$slider->clearMediaCollection('slider');
            $ext = $request->file('image')->getClientOriginalExtension();
            $slider
                ->addMedia($request->image)
                ->setFileName("slider-".$slider->id.'.'.$ext)
                ->toMediaCollection('slider');
        }
		
		$slider->update($request->all());
		session()->flash('message', 'Your record has been updated successfully');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
		session()->flash('message', 'Your record has been deleted successfully');
		return redirect(route('sliders.index'));
    }
}
