<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([

            'nombre'=>'Restaurante',
            'slug'=> Str::slug('Restaurante'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        
        ]);

        DB::table('categorias')->insert([

            'nombre'=>'Hostales',
            'slug'=> Str::slug('Hostales'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        
        ]);

        DB::table('categorias')->insert([

            'nombre'=>'Bares',
            'slug'=> Str::slug('Bares'),        
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        
        ]);

        DB::table('categorias')->insert([

            'nombre'=>'Cafeteria',
            'slug'=> Str::slug('Cafeteria'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        
        ]);

        DB::table('categorias')->insert([

            'nombre'=>'Peluquerias',
            'slug'=> Str::slug('Peluquerias'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        
        ]);

        DB::table('categorias')->insert([

            'nombre'=>'Barberias',
            'slug'=> Str::slug('Barberias'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        
        ]);

        DB::table('categorias')->insert([

            'nombre'=>'Talleres de Celulares',
            'slug'=> Str::slug('Talleres de Celulares'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        
        ]);

        DB::table('categorias')->insert([

            'nombre'=>'Talleres de Auto',
            'slug'=> Str::slug('Talleres de Auto'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        
        ]);

        DB::table('categorias')->insert([

            'nombre'=>'Panederia ',
            'slug'=> Str::slug('Panederia '),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        
        ]);

        DB::table('categorias')->insert([

            'nombre'=>'Dulcería',
            'slug'=> Str::slug('Dulcería'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        
        ]);

        DB::table('categorias')->insert([

            'nombre'=>'Gimnasio',
            'slug'=> Str::slug('Gimnasio'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        
        ]);

        DB::table('categorias')->insert([

            'nombre'=>'Taller de Laptop',
            'slug'=> Str::slug('Taller de Laptop'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        
        ]);

        DB::table('categorias')->insert([

            'nombre'=>'Multimedias',
            'slug'=> Str::slug('Multimedias'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        
        ]);
        DB::table('categorias')->insert([

            'nombre'=>'Fotografia y Videos',
            'slug'=> Str::slug('Fotografia y Videos'),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        
        ]);
        
    }
}
