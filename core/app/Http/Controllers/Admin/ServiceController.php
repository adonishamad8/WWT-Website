<?php

namespace App\Http\Controllers\Admin;

use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
		return view('admin.services.index', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
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
		
        $service = Service::create($request->all()); 

		// Add Image
		if ($request->image) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $service
                ->addMedia($request->image)
                ->setFileName("service-".$service->id.'.'.$ext)
                ->toMediaCollection('service');
        }
		
				
		// Add Thumb
		if ($request->imageThumb) {
            $ext = $request->file('imageThumb')->getClientOriginalExtension();
            $service
                ->addMedia($request->imageThumb)
                ->setFileName("serviceThumb-".$service->id.'.'.$ext)
                ->toMediaCollection('serviceThumb');
        }
        
		session()->flash('message', 'Your record has been added successfully');
		return redirect(route('services.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        if(!$request->get('published'))
            $request['published'] = 0;
		
		if($request->has('delete_existing_image')){
            $service->clearMediaCollection('service');
			session()->flash('message', 'Image has been successfully deleted');
            return redirect()->back();
        }
		
		if($request->has('delete_existing_image_thumb')){
            $service->clearMediaCollection('serviceThumb');
			session()->flash('message', 'Image has been successfully deleted');
            return redirect()->back();
        }
		
		if (isset($request->image)) {
			$service->clearMediaCollection('service');
            $ext = $request->file('image')->getClientOriginalExtension();
            $service
                ->addMedia($request->image)
                ->setFileName("service-".$service->id.'.'.$ext)
                ->toMediaCollection('service');
        }
		
		if (isset($request->imageThumb)) {
			$service->clearMediaCollection('programThumb');
            $ext = $request->file('imageThumb')->getClientOriginalExtension();
            $service
                ->addMedia($request->imageThumb)
                ->setFileName("serviceThumb-".$service->id.'.'.$ext)
                ->toMediaCollection('serviceThumb');
        }
		
		$service->update($request->all());
		session()->flash('message', 'Your record has been updated successfully');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
		session()->flash('message', 'Your record has been deleted successfully');
		return redirect(route('services.index'));
    }
}
