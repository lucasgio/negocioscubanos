<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Negocios;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class NegociosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        return view('negocios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriasNegocio = Categoria::all();
        return view('negocios.create',compact('categoriasNegocio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $data = $request -> validate([
            'nombre_negocio' => 'required',
            'categoria_id' => 'required',
            'imagen_principal' => 'required|image|max:1000',
            'calle' => 'required',
            'provincia' => 'required',
            'municipio' => 'required',
            'lat' => 'required',
            'lng'=>'required',
            'telefono' => 'required|numeric',
            'descripcion' => 'required|min:50',
            'apertura' => 'date_format:H:i',
            'cierre' => 'date_format:H:i|after:apertura',
            'uuid'=>'required|uuid'
        ]);

        // $data = $request->all();    

        // Save image_bussines
        $rute_img = $request['imagen_principal']->store('main_image','public');
        // Resize img
        $img = Image::make(public_path("storage/{$rute_img}"))->fit(800,680);
        $img->save();
          
        // Store BD bussiness
        $negocios = new Negocios($data);
        $negocios -> imagen_principal = $rute_img;
        $negocios -> user_id = auth()->user()->id;
        $negocios->save();
        
        return back()->with('estado','Se ha registrado tu negocio con exito.Felicidades !!!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Negocios  $negocios
     * @return \Illuminate\Http\Response
     */
    public function show(Negocios $negocios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Negocios  $negocios
     * @return \Illuminate\Http\Response
     */
    public function edit(Negocios $negocios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Negocios  $negocios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Negocios $negocios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Negocios  $negocios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Negocios $negocios)
    {
        //
    }
}
