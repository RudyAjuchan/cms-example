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

        $temp_file = TemporalFile::where('folder', $request->image)->first();

        if($temp_file){
            Storage::copy('posts/temp/'.$temp_file->folder.'/'.$temp_file->file, 'posts/'.$temp_file->folder.'/'.$temp_file->file);

            $publicado = 0;
            if($request->publicado == "on"){
                $publicado = 1;
            }

            $datosTags = json_decode(stripslashes($request->tagsG),true);

            $data = [
                'nombre' => $request->nombre,
                /* 'slug' => $request->slug, */
                'image' => $temp_file->folder.'/'.$temp_file->file,
                'body' => $request->body,
                'publicado' => $publicado,
                'tags' => $datosTags,
                'categorias_id' => $request->categorias_id,
            ];

            $post = posts::create($data);
            /* $post = new posts();
            $post->nombre = $request->nombre;
            $post->slug = $request->slug;
            $post->image = $temp_file->folder.'/'.$temp_file->file;
            $post->body = $request->body;
            $post->publicado = $publicado;
            $post->tags = $datosTags;
            $post->categorias_id = $request->categorias_id;
            $post->save(); */

            Storage::deleteDirectory('posts/temp/'.$temp_file->folder);
            $temp_file->delete();
            return redirect('/posts')->with('success', 'Done!');
        }

        /* $datosTags = json_decode(stripslashes($request->tagsG),true);
        $data = [
            'nombre' => 'a',
            'slug' => 'a',
            'image' => 'a',
            'body' => 'a',
            'publicado' => 'a',
            'tags' => $datosTags,
            'categorias_id' => 'a',
        ];

        return compact('datosTags', 'data'); */
    }

    /**
     * Display the specified resource.
     */
    public function show(posts $posts)
    {
        return $posts;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = posts::find($id);
        $categorias = Categorias::all();
        return view('posts.edit', compact('post', 'categorias'));
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

    public function getImg($id){
        $post = posts::where('id', $id)->first();
        return '/storage/posts/'.$post->image;
    }
}
