<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categorias::where('estado',1)->get();
        $categoriasPapelera = Categorias::where('estado',0)->get();
        return view('categorias.categoria',compact('categorias','categoriasPapelera'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required']
        ]);

        $publicado = 0;
        if($request->publicado == "on"){
            $publicado = 1;
        }        
        $categorias = new Categorias();
        $categorias -> nombre = $request->nombre;
        $categorias -> publicado = $publicado;
        $categorias->save();
        return redirect('/categorias/create')->with('success', 'Done!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorias $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {   
        $categorias = Categorias::find($id);
        return view('categorias.edit', $categorias);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => ['required']
        ]);

        $publicado = 0;
        if($request->publicado == "on"){
            $publicado = 1;
        }        
        $categorias = Categorias::find($id);
        $categorias -> nombre = $request->nombre;
        $categorias -> publicado = $publicado;
        $categorias->save();
        return redirect('/categorias/'.$id.'/edit')->with('success', 'Done!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categorias = Categorias::find($id);
        $categorias->estado = 0;
        $categorias->save();
        return redirect('/categorias')->with('delete', 'Done!');
    }

    public function deletes(Request $request){
        return $request;
    }
}
