<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reserva_turismo', function (Blueprint $table) {
            $table->id('id_reserva_turismo');
            $table->string('nombre_cliente');
            $table->integer('contacto_cliente');
            $table->date('fecha_reserva');
            $table->time('hora_inicio');
            $table->time('hora_final');
            $table->string('guia_encargado');
            $table->integer('cantidad_personas');
            $table->double('costo_turismo');
            $table->enum('estado_carrera',['Pendiente','Completado','Cancelado'])->default('Pendiente');
            $table->integer('id_paquetes');
            $table->integer('id_persona');

            $table->foreign('id_persona')->references('id_persona')->on('personas');
            $table->foreign('id_paquetes')->references('id_paquetes')->on('paquetes_turismo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva_turismo');
    }
};
