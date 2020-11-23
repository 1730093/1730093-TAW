<?php

namespace App\Http\Controllers;
use App\Models\Recetas2;
use App\Models\CategoriaReceta;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RecetaController2 extends Controller
{

    //Validar la restriccion a todos los métodos de usuario autenticado
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
        $recetas = auth()->user()->recetas;
        return view('recetas.index')->with('recetas', $recetas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Creamos una consulta a la bd sobre las categorias de las recetas
        $categorias=DB::table('categoria_recetas')->get()->pluck('nombre','id');
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
        /*
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
            'imagen'=>$ruta_imagen, //Nombre temporal
            //Determinamos el usuario autenticado (importamos la clase Auth)
            'user_id'=>Auth::user()->id,
            'categoria_id'=>$data['categoria']

        ]);

        //return redirect()->action('RecetaController2@index');
        //Almacena la receta a la BD
        //dd($request->all());
        //return redirect('recetas/create')->with($success, 'Success!');
        //return redirect('recetas/create');
        */
        // dd( $request['imagen']->store('upload-recetas', 'public') );
        // validación

        $data = $request->validate([
            'titulo' => 'required|min:6',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'imagen' => 'required|image',
            'categoria' => 'required',
        ]);
            // obtener la ruta de la imagen
        $ruta_imagen = $request['imagen']->store('upload-recetas', 'public');
            // almacenar en la bd (sin modelo)
            // DB::table('recetas')->insert([
            // 'titulo' => $data['titulo'],
            // 'preparacion' => $data['preparacion'],
            // 'ingredientes' => $data['ingredientes'],
            // 'imagen' => $ruta_imagen,
            // 'user_id' => Auth::user()->id,
            // 'categoria_id' => $data['categoria']
            // ]);
        // almacenar en la BD (con modelo) recetas por usuario
        auth()->user()->recetas()->create([
            'titulo' => $data['titulo'],
            'preparacion' => $data['preparacion'],
            'ingredientes' => $data['ingredientes'],
            'imagen' => $ruta_imagen,
            'categoria_id' => $data['categoria']
            ]);

        //REDIRECCIONAR
        //return redirect()->action('RecetaController2@index');

        return redirect('recetas/create')->with('alertas', 'La receta ha sido agregada!');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Recetas2 $receta
     * @return \Illuminate\Http\Response
     */
    public function show($receta){
        $receta = Recetas2::findOrFail($receta);
        return view('recetas.muestra', compact('receta'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recetas2 $receta
     * @return \Illuminate\Http\Response
     */
    public function edit($receta)
    {
        $categorias=DB::table('categoria_recetas')->get()->pluck('nombre','id');
        $receta = Recetas2::findOrFail($receta);

        //return view('recetas.editar')->with('categorias', $categorias, 'receta', $receta);
        return view('recetas.editar', compact('categorias', 'receta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recetas2 $receta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $receta)
    {
        return $receta;
         // validación
         $data = $request->validate([
            'titulo' => 'required|min:6',
            'preparacion' => 'required',
            'ingredientes' => 'required',
            'categoria' => 'required',
        ]);

        //Pasar los valores
        $receta->titulo = $data['titulo'];


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "Desde destroy";

    }
}
