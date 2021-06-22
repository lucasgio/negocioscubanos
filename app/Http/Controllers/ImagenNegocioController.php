<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImagenNegocio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImagenNegocioController extends Controller
{
    

    public function store(Request $request)
    {
        $rutaImg = $request->file('file')->store('negocios','public');

        // Resize img
        $imagen = Image::make( public_path("storage/{$rutaImg}"))->fit(600, 350);
        $imagen->save();

        // Store DB
        $imageDB = new ImagenNegocio;
        $imageDB -> id_negocio = $request['uuid'];
        $imageDB -> ruta = $rutaImg;
        $imageDB->save();


        $resp = [
            'archivo'=>$rutaImg
        ];

        return response()->json($resp);

    }


    public function destroy(Request $request)
    {

        $imagen = $request->get('imagen');


        if (File::exists('storage/' . $imagen)) {
            File::delete('storage/' . $imagen);
        }

        $resp = [
            'mensaje'=> 'Imagen Eliminada',
            'imagen'=> $imagen
        ];

        ImagenNegocio::where('ruta',$imagen)->delete();
        return response()->json($resp);




    }


}
