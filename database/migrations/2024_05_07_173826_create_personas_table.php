<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    /*
    $id_persona = null,
            $nombre_persona = null,
            $apellido_persona = null,
            $celular_persona = null,
            $correo_persona = null
    */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id('id_persona');
            $table->string('nombre_persona');
            $table->string('apellido_persona');
            $table->integer('celular_persona');
            $table->string('correo_persona');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('personas');
    }
};
