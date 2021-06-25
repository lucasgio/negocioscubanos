<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Negocios;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

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
        $categorias = Categoria::all();
        return view('negocios.create',compact('categorias'));
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

        // Fit img and Upload to Digital Ocean
        $file = request() -> file('imagen_principal');
        // Obtain name of file 
        $imageName = $file -> getClientOriginalName();
        // Intervation Image
        $img = Image::make($file)->fit(800,600);
        $resource = $img->stream()->detach();
        // Upload and get image
        $imgUploadServer = Storage::disk('spaces')->put('negocios/'.$imageName,$resource);
        // Get back url img from server 
        $imgServer =Storage::disk(name:'spaces')->url('negocios/'.$imageName);

        // Store BD bussiness
        $negocios = new Negocios($data);
        $negocios -> imagen_principal = $imgServer;
        $negocios -> user_id = auth()->user()->id;
        $negocios->save();
        
        return back()->with('estado','Se ha registrado tu negocio con exito.Felicidades !!!!');

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
