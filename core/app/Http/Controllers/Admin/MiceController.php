<?php

namespace App\Http\Controllers\Admin;

use App\Mice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mices = Mice::all();
		return view('admin.mices.index', ['mices' => $mices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mice = Mice::create($request->all());
		
		if(!$request->get('published'))
            $request['published'] = 0;
		
		// Add Image
		if ($request->image) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $mice
                ->addMedia($request->image)
                ->setFileName("mice-".$mice->id.'.'.$ext)
                ->toMediaCollection('mice');
        }
		
		// Add multiple images
        foreach ($request->input('gallery_image', []) as $file) {
            $mice->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
        }
		
		session()->flash('message', 'Your record has been added successfully');
		return redirect(route('mices.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mice  $mice
     * @return \Illuminate\Http\Response
     */
    public function show(Mice $mice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mice  $mice
     * @return \Illuminate\Http\Response
     */
    public function edit(Mice $mice)
    {
        return view('admin.mices.edit', compact('mice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mice  $mice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mice $mice)
    {
        if(!$request->get('published'))
            $request['published'] = 0;
		
		if($request->has('delete_existing_image')){
            $mice->clearMediaCollection('mice');
			session()->flash('message', 'Image has been successfully deleted');
            return redirect()->back();
        }
		
		if (isset($request->image)) {
			$mice->clearMediaCollection('mice');
            $ext = $request->file('image')->getClientOriginalExtension();
            $mice
                ->addMedia($request->image)
                ->setFileName("mice-".$mice->id.'.'.$ext)
                ->toMediaCollection('mice');
        }
		
		// Remove media files removed by the user on edit mice
        if ($mice->getMedia('gallery')->count()) {
            foreach ($mice->getMedia('gallery') as $media) {
                if (!in_array($media->file_name, $request->input('gallery_image', []))) {
                    $media->delete();
                }
            }
        }
		
		// Add media file added by the user on edit mice
        $media = $mice->getMedia('gallery')->pluck('file_name')->toArray();
        foreach ($request->input('gallery_image', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $mice->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
            }
        }
		
		$mice->update($request->all());
		session()->flash('message', 'Your record has been updated successfully');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mice  $mice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mice $mice)
    {
        $mice->delete();
		session()->flash('message', 'Your record has been deleted successfully');
		return redirect(route('mices.index'));
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
}
