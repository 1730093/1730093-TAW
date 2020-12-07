<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\meseros;
use App\Models\mesas;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class mesasController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
        
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$recetas = auth()->user()->recetas;
        //return view('recetas.index')->with('recetas', $recetas);
        $mesas = DB::table('mesas')->get();
        return view('mesas.index')->with('mesas', $mesas);
    }
    public function create()
    {
        return view('mesas.create');
    }
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'mesa' => 'required|min:6',
        ]);
            // obtener la ruta de la imagen
            // almacenar en la bd (sin modelo)
        DB::table('mesas')->insert([
         'nombre' => $data['mesa']
            // 'preparacion' => $data['preparacion'],
            // 'ingredientes' => $data['ingredientes'],
            // 'imagen' => $ruta_imagen,
            // 'user_id' => Auth::user()->id,
            // 'categoria_id' => $data['categoria']
        ]);
        return redirect(route ('mesas.index'));
    }


     /**
     * Display the specified resource.
     *
     * @param  \App\Models\mesas $mesas
     * @return \Illuminate\Http\Response
     */

    public function show($mesas){
        $mesa = mesas::findOrFail($mesas);
        //return view('mesas.show', compact('mesa'));
        return $mesa;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mesas $mesa
     * @return \Illuminate\Http\Response
     */
    public function edit($mesa)
    {
        $mesa = mesas::findOrFail($mesa);
        //return $mesa;
        return view('mesas.editar', compact('mesa'));
    }


      /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mesas $mesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mesas $mesa)
    {
        //Verificar que el usuario que creo la receta es el que la puede editar
        //$this->authorize('update', $receta);

        //return $receta;
        // validación de los valores
         $data = $request->validate([
            'mesa' => 'required|min:6',
        ]);

        //Se le asignan los valores de data a receta
        $mesa->nombre = $data['mesa'];
        //SE DETECTA CUANDO EL USUARIO ACTUALIZO LA IMAGEN DE LA RECETA
        
        //PARA ACTUALIZAR LA RECETA
        $mesa->save();
        //PARA REDIRECCIONAR A INDEX
        return redirect(route ('mesas.index'));
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mesas $mesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(mesas $mesa)
    {
        //Metodo para eliminar la receta
        $mesa->delete();
        //Para redireccionar al index
        return redirect(route ('mesas.index'));
    }
}
