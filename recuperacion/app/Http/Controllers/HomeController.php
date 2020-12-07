<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\meseros;
use App\Models\mesas;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $meseros = meseros::orderBy('created_at', 'DESC')->limit(6)->get();
        //Despues se retorna a la vista inicio, pero se le agrega la variable meseros
        return view('home', compact('meseros'));
    }
}
