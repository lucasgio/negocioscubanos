<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNegociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug');
            $table->timestamps();
        });


        Schema::create('negocios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_negocio');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->string('logotipo')->nullable();
            $table->string('imagen_principal');
            $table->string('calle');
            $table->string('provincia');
            $table->string('municipio');
            $table->string('lat');
            $table->string('lng');
            $table->string('telefono');
            $table->text('descripcion');
            $table->time('apertura');
            $table->time('cierre');
            $table->uuid('uuid');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('negocios');
        Schema::dropIfExists('categorias');
    }
}
