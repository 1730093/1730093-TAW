<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\meseros;
use App\Models\mesas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class meserosController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
        
    }
    
    public function index()
    {
        //$recetas = auth()->user()->recetas;
        $meseros = DB::table('meseros')->get();
        return view('meseros.index')->with('meseros', $meseros);
    }
    public function create()
    {
        //Creamos una consulta a la bd sobre las categorias de las recetas
        $mesas=DB::table('mesas')->get()->pluck('nombre','id');
        //Esta consulta retorna un array con los elementos de la tabla categoria
        //Manda a la vista del formulario
        return view('meseros.create')->with('mesas', $mesas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data=request()->validate([
            //Reglas de validacion:
            'nombre' => 'required',
            'apellidos' => 'required',
            'edad' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'mesa' => 'required'
        ]);

        //Facade de Laravel para insertar un registro a la BD
        DB::table('meseros')->insert([
            'nombre'=>$data['nombre'],
            'apellidos'=>$data['apellidos'],
            'telefono'=>$data['telefono'],
            'edad'=>$data['edad'],
            'correo'=>$data['correo'],
            'mesa_id'=>$data['mesa']
        
        ]);
        return redirect(route ('meseros.index'));
    }
    

      /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\meseros $mesero
     * @return \Illuminate\Http\Response
     */
    public function edit($mesero)
    {
        $mesas=DB::table('mesas')->get()->pluck('nombre','id');
        $mesero = meseros::findOrFail($mesero);
        return view('meseros.editar', compact('mesas', 'mesero'));
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\meseros $mesero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, meseros $mesero)
    {
        // validación de los valores
         $data = $request->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'edad' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'mesa' => 'required'
        ]);

        //Se le asignan los valores de data a mesero
        $mesero->nombre = $data['nombre'];
        $mesero->apellidos = $data['apellidos'];
        $mesero->telefono = $data['telefono'];
        $mesero->edad = $data['edad'];
        $mesero->correo = $data['correo'];
        $mesero->mesa_id = $data['mesa'];
        
        
        $mesero->save();
        //PARA REDIRECCIONAR A INDEX
        return redirect(route ('meseros.index'));
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\meseros $mesero
     * @return \Illuminate\Http\Response
     */
    public function destroy(meseros $mesero)
    {
        //Metodo para eliminar a mesero
        $mesero->delete();
        //Para redireccionar al index
        return redirect(route ('meseros.index'));
    }
}
