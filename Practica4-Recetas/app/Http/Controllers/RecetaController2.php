<?php

namespace App\Http\Controllers;
use App\Models\Receta2;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RecetaController2 extends Controller
{

    //Validar la restriccion a todos los métodos de usuario autenticado
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('recetas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Creamos una consulta a la bd sobre las categorias de las recetas
        $categorias=DB::table('categoria_receta')->get()->pluck('nombre','id');
        //Esta consulta retorna un array con los elementos de la tabla categoria
        //Manda a la vista del formulario
        return view('recetas.create')->with('categorias',$categorias);
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
            'titulo' => 'required|min:6',
            'categoria' => 'required',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'imagen' => 'required|image'
        ]);
        $ruta_imagen= $request['imagen']-> store('upload-recetas', 'public');

        //Facade de Laravel para insertar un registro a la BD
        DB::table('receta2s')->insert([
            'titulo'=>$data['titulo'],
            'preparacion'=>$data['preparacion'],
            'ingredientes'=>$data['ingredientes'],
            'imagen'=>'imagen.jpg', //Nombre temporal
            //Determinamos el usuario autenticado (importamos la clase Auth)
            'user_id'=>Auth::user()->id,
            'categoria_id'=>$data['categoria']

        ]);

        //return redirect()->action('RecetaController2@index');
        //Almacena la receta a la BD
        //dd($request->all());
        //return redirect('recetas/create')->with($success, 'Success!');
        //return redirect('recetas/create');
        return redirect('recetas/create')->with('alertas', 'La receta ha sido agregada!');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
