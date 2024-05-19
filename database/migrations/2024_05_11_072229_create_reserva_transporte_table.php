<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 1public $id_reserva_transporte;
        2public $nombre_cliente;
        3public $contacto_cliente;
        4public $cantidad_personas;
        5public $recoger_de;
        6public $llevar_a;
        7public $fecha_reserva;
        8public $hora_reserva;
        9public $forma_pago;
        10public $costo_carrera;
        11public $estado_carrera;
        12public $id_persona;
     */
    public function up(): void
    {
        Schema::create('reserva_transporte', function (Blueprint $table) {
            $table->id('id_reserva_transporte');
            $table->string('nombre_cliente');
            $table->integer('contacto_cliente');
            $table->integer('cantidad_personas');
            $table->string('recoger_de');
            $table->string('llevar_a');
            $table->date('fecha_reserva');
            $table->time('hora_reserva');
            $table->string('forma_pago');
            $table->integer('costo_carrera');
            $table->enum('estado_carrera',['Pendiente','Completado','Cancelado'])->default('Pendiente');
            $table->integer('id_persona');
            $table->foreign('id_persona')->references('id_persona')->on('personas');
        

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva_transporte');
    }
};
