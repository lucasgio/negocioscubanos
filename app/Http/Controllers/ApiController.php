<?php

namespace App\Http\Controllers;

use App\Models\Negocios;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\ImagenNegocio;

class ApiController extends Controller
{
    
    // Obtener todas las categorias
    public function allCategory()
    {
        $categoria = Categoria::all();
        return response()->json($categoria, 200);
    }
 
    // obtener una categoria
    public function categoria(Categoria $categoria)
    { 
        $negocios = Negocios::where('categoria_id',$categoria->id)->with('categoria')->get();   
        return response()->json($negocios, 200);
    }

    // Mostrar negocio por id
    public function show ( Negocios $negocios)
    {   
        $imagenes = ImagenNegocio::where('id_negocio',$negocios->uuid)->get();
        $negocios->imagen = $imagenes;
        return response()->json($negocios, 200);
    }

    // Metodo para obtener todos los neogicos
    public function index()
    {
        $negocios = Negocios::with('categoria')->get();
        return response()->json($negocios, 200);
    }


}
