<?php

namespace App\Http\Controllers\Admin;

use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
		return view('admin.reviews.index', ['reviews' => $reviews]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = Review::create($request->all());
		
		if(!$request->get('published'))
            $request['published'] = 0;
		
		// Add Image
		if ($request->image) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $review
                ->addMedia($request->image)
                ->setFileName("review-".$review->id.'.'.$ext)
                ->toMediaCollection('review');
        }
		
		session()->flash('message', 'Your record has been added successfully');
		return redirect(route('reviews.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('admin.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        if(!$request->get('published'))
            $request['published'] = 0;
		
		if($request->has('delete_existing_image')){
            $review->clearMediaCollection('review');
			session()->flash('message', 'Image has been successfully deleted');
            return redirect()->back();
        }
		
		if (isset($request->image)) {
			$review->clearMediaCollection('review');
            $ext = $request->file('image')->getClientOriginalExtension();
            $review
                ->addMedia($request->image)
                ->setFileName("review-".$review->id.'.'.$ext)
                ->toMediaCollection('review');
        }
		
		$review->update($request->all());
		session()->flash('message', 'Your record has been updated successfully');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();
		session()->flash('message', 'Your record has been deleted successfully');
		return redirect(route('reviews.index'));
    }
}
