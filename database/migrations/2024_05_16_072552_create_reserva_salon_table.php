<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.asdasdasdsadsada
     */
    public function up(): void
    {
        Schema::create('reserva_salon', function (Blueprint $table) {
            $table->id('id_reserva_salon');
            $table->string('nombre_evento');
            $table->string('nombre_cliente');
            $table->integer('celular_cliente');
            $table->string('tipo_cliente');
            $table->date('fecha_reserva');
            $table->time('hora_inicio');
            $table->time('hora_final');
            $table->integer('horas_totales');
            $table->string('tipo_periodo');
            $table->double('costo_salon');
            $table->enum('estado_reserva',['Pendiente','Completado','Cancelado'])->default('Pendiente');
            $table->integer('id_persona');
            $table->integer('id_salon');
            $table->integer('id_armado');

            $table->foreign('id_persona')->references('id_persona')->on('personas');
            $table->foreign('id_salon')->references('id_salon')->on('salon');
            $table->foreign('id_armado')->references('id_armado')->on('tipo_armado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva_salon');
    }
};
