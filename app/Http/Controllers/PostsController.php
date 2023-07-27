<?php

namespace App\Http\Controllers;

use App\Models\posts;
use App\Models\Categorias;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = posts::where('estado',1)->get();
        $postsPapelera = posts::where('estado',0)->get();
        return view('posts.post',compact('posts','postsPapelera'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categorias::where('estado',1)->where('publicado',1)->get();
        return view('posts.new', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(posts $posts)
    {
        //
    }
}
