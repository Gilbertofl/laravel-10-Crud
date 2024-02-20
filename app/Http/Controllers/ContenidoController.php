<?php

namespace App\Http\Controllers;

use App\Models\Contenido;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContenidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $perPage = request()->get('perPage') ?? 10;
        $contenidos = Contenido::paginate($perPage);
        $contenidos->appends(['perPage' => $perPage]);
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
            'note'=> 'required|string|max:250',
            'year'=> 'required|max:4|date_format:Y',
            
        ]);

        $contenido = new Contenido();
        $contenido->name = $request->input('name');
        $contenido->note = $request->input('note');
        $contenido->year = $request->input('year');
        $contenido->save();

        return redirect('contenido')->with('message1', 'Guardado exitosamente');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        try{
            $contenido = Contenido::findOrFail($id);
            return view('contenido.edit', ['contenido'=> $contenido]);
        }catch(ModelNotFoundException $e){
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name'=> 'required',
            'note'=> 'required|max:250',
            'year'=> 'required|max:4|date_format:Y',
            
        ]);

        $contenido = Contenido::find($id);
        $contenido->name = $request->input('name');
        $contenido->note = $request->input('note');
        $contenido->year = $request->input('year');
        $contenido->save();

        return redirect('contenido')->with('message2', 'Nota modificada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
       try {

        $contenido = Contenido::findOrFail($id);
        $contenido->delete();

        return redirect('contenido')->with('message3', 'Nota eliminada');

       }catch(ModelNotFoundException $e) {
        abort(404);
       }
    }
}
