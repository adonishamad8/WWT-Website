<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
		$blogs = Blog::all();
		return view('admin.blogs.index', ['blogs' => $blogs]);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogs.create');
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
		
        $blog = Blog::create($request->all());

		// Add Image
		if ($request->image) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $blog
                ->addMedia($request->image)
                ->setFileName("blog-".$blog->id.'.'.$ext)
                ->toMediaCollection('blog');
        }
		
		// Add multiple images
        foreach ($request->input('gallery_image', []) as $file) {
            $blog->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
        }
		
		//Tags
        $tags = explode(",", $request['tags']);
        $tagIds = [];
        foreach($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            array_push($tagIds, $tag->id);
        }
        $blog->tags()->sync($tagIds);
        
		session()->flash('message', 'Your record has been added successfully');
		return redirect(route('blogs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        if(!$request->get('published'))
            $request['published'] = 0;
		
		if(!$request->get('is_video'))
            $request['is_video'] = 0;
		
		if($request->has('delete_existing_image')){
            $blog->clearMediaCollection('blog');
			session()->flash('message', 'Image has been successfully deleted');
            return redirect()->back();
        }
		
		if (isset($request->image)) {
			$blog->clearMediaCollection('blog');
            $ext = $request->file('image')->getClientOriginalExtension();
            $blog
                ->addMedia($request->image)
                ->setFileName("blog-".$blog->id.'.'.$ext)
                ->toMediaCollection('blog');
        }
		
		// Remove media files removed by the user on edit blog
        if ( $blog->getMedia('gallery')->count()) {
            foreach ($blog->getMedia('gallery') as $media) {
                if (!in_array($media->file_name, $request->input('gallery_image', []))) {
                    $media->delete();
                }
            }
        }
		
		// Add media file added by the user on edit blog
        $media = $blog->getMedia('gallery')->pluck('file_name')->toArray();
        foreach ($request->input('gallery_image', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $blog->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('gallery');
            }
        }
		
		$tags = explode(",", $request['tag_list']);
        $tagIds = [];
        foreach($tags as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);
            array_push($tagIds, $tag->id);
        }

        // attach tags to blog
        $blog->tags()->sync($tagIds);
		
		$blog->update($request->all());
		session()->flash('message', 'Your record has been updated successfully');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
		session()->flash('message', 'Your record has been deleted successfully');
		return redirect(route('blogs.index'));
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