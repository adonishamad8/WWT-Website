<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
		return view('admin.events.index', ['events' => $events]);
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
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
		
		if(!$request->get('is_video'))
            $request['is_video'] = 0;
		
        $event = Event::create($request->all());

		// Add Image
		if ($request->image) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $event
                ->addMedia($request->image)
                ->setFileName("event-".$event->id.'.'.$ext)
                ->toMediaCollection('event');
        }
		
		// Add multiple images
        foreach ($request->input('gallery_image', []) as $file) {
            $event->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
        }
		
		//Tags
        $tags = explode(",", $request['tags']);
        $tagIds = [];
        foreach($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            array_push($tagIds, $tag->id);
        }
        $event->tags()->sync($tagIds);
		
        
		session()->flash('message', 'Your record has been added successfully');
		return redirect(route('events.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        if(!$request->get('published'))
            $request['published'] = 0;
		
		if(!$request->get('is_video'))
            $request['is_video'] = 0;
		
		if($request->has('delete_existing_image')){
            $event->clearMediaCollection('event');
			session()->flash('message', 'Image has been successfully deleted');
            return redirect()->back();
        }
		
		if (isset($request->image)) {
			$event->clearMediaCollection('event');
            $ext = $request->file('image')->getClientOriginalExtension();
            $event
                ->addMedia($request->image)
                ->setFileName("event-".$event->id.'.'.$ext)
                ->toMediaCollection('event');
        }
		
		// Remove media files removed by the user on edit event
        if ($event->getMedia('gallery')->count()) {
            foreach ($event->getMedia('gallery') as $media) {
                if (!in_array($media->file_name, $request->input('gallery_image', []))) {
                    $media->delete();
                }
            }
        }
		
		// Add media file added by the user on edit event
        $media = $event->getMedia('gallery')->pluck('file_name')->toArray();
        foreach ($request->input('gallery_image', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $event->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
            }
        }
		
		$tags = explode(",", $request['tag_list']);
        $tagIds = [];
        foreach($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            array_push($tagIds, $tag->id);
        }

        // attach tags to event
        $event->tags()->sync($tagIds);
		
		$event->update($request->all());
		session()->flash('message', 'Your record has been updated successfully');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
		session()->flash('message', 'Your record has been deleted successfully');
		return redirect(route('events.index'));
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
