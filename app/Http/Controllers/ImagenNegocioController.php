<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImagenNegocio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImagenNegocioController extends Controller
{
    

    public function store(Request $request)
    {
           // Fit img and Upload to Digital Ocean
           $file = request() -> file('file');
           // Obtain name of file 
           $imageName = $file -> getClientOriginalName();
           // Intervation Image
           $img = Image::make($file)->fit(600,350);
           $resource = $img->stream()->detach();
           // Upload and get image
           $imgUploadServer = Storage::disk('spaces')->put('negocios-galeria' . $imageName,$resource);
           // Get back url img from server 
           $imgServer =Storage::disk(name:'spaces')->url('negocios-galeria'.$imageName);

        // Store DB
        $imageDB = new ImagenNegocio;
        $imageDB -> id_negocio = $request['uuid'];
        $imageDB -> ruta = $imgServer;
        $imageDB->save();


        $resp = [
            'archivo'=>$imgServer
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
