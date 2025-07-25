<?php

namespace App\Http\Controllers;

use App;
use App\Category;
use App\Blog;
use App\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
		$categories = Category::orderBy('order', 'ASC')->where('published', '1')->get();
		$blogs = Blog::orderBy('date', 'DESC')->where('published', '1')->get();
		
        return view('front.blogs', ['blogs' => $blogs, 'categories' => $categories]);
    }

	public function show($id, $slug)
    {
		$categories = Category::orderBy('order', 'ASC')->where('published', '1')->get();
		$blog = Blog::find($id);

			
		if($blog != null && $slug == $blog->slug){
			return view('front.blog-details', ['blog' => $blog, 'categories' => $categories]);
		}
		else{
			abort(404);
		}
    }
}
