<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    { 
        $categories = Category::all();
		return view('admin.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::create($request->all());
		
		if(!$request->get('published'))
            $request['published'] = 0;
		
		// Add Image
		if ($request->image) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $category
                ->addMedia($request->image)
                ->setFileName("category-".$category->id.'.'.$ext)
                ->toMediaCollection('category');
        }
		
		session()->flash('message', 'Your record has been added successfully');
		return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {		
		if(!$request->get('published'))
            $request['published'] = 0;
		
		if($request->has('delete_existing_image')){
            $category->clearMediaCollection('category');
			session()->flash('message', 'Image has been successfully deleted');
            return redirect()->back();
        }
		
		if (isset($request->image)) {
			$category->clearMediaCollection('category');
            $ext = $request->file('image')->getClientOriginalExtension();
            $category
                ->addMedia($request->image)
                ->setFileName("category-".$category->id.'.'.$ext)
                ->toMediaCollection('category');
        }
		
		$category->update($request->all());
		session()->flash('message', 'Your record has been updated successfully');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
		session()->flash('message', 'Your record has been deleted successfully');
		return redirect(route('categories.index'));
    }
}