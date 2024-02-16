<?php

namespace App\Http\Controllers;

use App\Models\Contenido;
use Illuminate\Http\Request;

class ContenidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contenidos = Contenido::all();
        return view("contenido.contenido", ['contenidos' => $contenidos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("contenido.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=> 'required',
            'note'=> 'required|max:150',
            'year'=> 'required|max:4',
            
        ]);

        $contenido = new Contenido();
        $contenido->name = $request->input('name');
        $contenido->note = $request->input('note');
        $contenido->year = $request->input('year');
        $contenido->save();

        return view('contenido.message', ['msg'=> 'Guardado exitosamente']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contenido $contenido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $contenido = Contenido::find($id);
        return view('contenido.edit', ['contenido'=> $contenido]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name'=> 'required',
            'note'=> 'required|max:150',
            'year'=> 'required|max:4',
            
        ]);

        $contenido = Contenido::find($id);
        $contenido->name = $request->input('name');
        $contenido->note = $request->input('note');
        $contenido->year = $request->input('year');
        $contenido->save();

        return view('contenido.message', ['msg'=> 'Nota modificada']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $contenido = Contenido::find($id);
        $contenido->delete();

        return redirect('contenido');
    }
}
