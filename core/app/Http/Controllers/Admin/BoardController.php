<?php

namespace App\Http\Controllers\Admin;

use App\Board;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boards = Board::all();
		return view('admin.boards.index', ['boards' => $boards]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.boards.create'); 
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
		
        $board = Board::create($request->all());

		// Add Image
		if ($request->image) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $board
                ->addMedia($request->image)
                ->setFileName("board-".$board->id.'.'.$ext)
                ->toMediaCollection('board');
        }
        
		session()->flash('message', 'Your record has been added successfully');
		return redirect(route('boards.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function edit(Board $board)
    {
        return view('admin.boards.edit', compact('board'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Board $board)
    {
        if(!$request->get('published'))
            $request['published'] = 0;
		
		if($request->has('delete_existing_image')){
            $board->clearMediaCollection('board');
			session()->flash('message', 'Image has been successfully deleted');
            return redirect()->back();
        }
		
		if (isset($request->image)) {
			$board->clearMediaCollection('board');
            $ext = $request->file('image')->getClientOriginalExtension();
            $board
                ->addMedia($request->image)
                ->setFileName("board-".$board->id.'.'.$ext)
                ->toMediaCollection('board');
        }
		
		$board->update($request->all());
		session()->flash('message', 'Your record has been updated successfully');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board)
    {
        $board->delete();
		session()->flash('message', 'Your record has been deleted successfully');
		return redirect(route('boards.index'));
    }
}
