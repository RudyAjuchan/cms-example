<?php

namespace App\Http\Controllers;

use App\Models\posts;
use App\Models\Categorias;
use App\Models\TemporalFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'nombre' => ['required'],
            'slug' => ['required'],
            'body' => ['required'],
            'image' => ['required'],
            'categorias_id' => ['required'],
        ]);

        $publicado = 0;
        if($request->publicado == "on"){
            $publicado = 1;
        }

        $post = new posts();
        $post->nombre = $request->nombre;
        $post->slug = $request->slug;
        $post->image = $request->image;
        $post->body = $request->body;
        $post->publicado = $publicado;
        $post->tags = $request->tagsG;
        $post->categorias_id = $request->categorias_id;
        $post->save();
        return redirect('/posts')->with('success', 'Done!');
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

    public function tempUpload(Request $request){
        if($request->hasFile('image')){
            $image = $request->file('image');
            $file_name = $image->getClientOriginalName();
            $folder = uniqid('post', true);
            $image->storeAs('posts/temp/'.$folder, $file_name);
            TemporalFile::create([
                'folder' => $folder,
                'file' => $file_name
            ]);
            return $folder;
        }
    }

    public function tempDelete(){
        $temp_file = TemporalFile::where('folder', request()->getContent())->first();
        if($temp_file){
            Storage::deleteDirectory('posts/temp/'.$temp_file->folder);
            $temp_file->delete();
            return response('');
        }
    }
}
