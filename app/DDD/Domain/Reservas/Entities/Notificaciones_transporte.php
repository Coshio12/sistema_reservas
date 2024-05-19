<?php 
/*
id_notificacion
fecha
hora
descripcion
id_persona
id_reserva_transporte
*/
namespace App\DDD\Domain\Reservas\Entities;

    class Notificaciones_transporte
    {
        public $id_notificacion;
        public $fecha;
        public $hora;
        public $descripcion;
        public $id_persona;
        public $id_reserva_transporte;

        public function __construct(
            $id_notificacion = null,
            $fecha = null,
            $hora = null,
            $descripcion = null,
            $id_persona = null,
            $id_reserva_transporte = null
        )
        {
            $this->id_notificacion = $id_notificacion;
            $this->fecha = $fecha;
            $this->hora = $hora;
            $this->descripcion = $descripcion;
            $this->id_persona = $id_persona;
            $this->id_reserva_transporte = $id_reserva_transporte;
        }
    }

?>