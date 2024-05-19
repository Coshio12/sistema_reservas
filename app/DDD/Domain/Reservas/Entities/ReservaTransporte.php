<?php 

namespace App\DDD\Domain\Reservas\Entities;
    class ReservaTransporte{
        public $id_reserva_transporte;
        public $nombre_cliente;
        public $contacto_cliente;
        public $cantidad_personas;
        public $recoger_de;
        public $llevar_a;
        public $fecha_reserva;
        public $hora_reserva;
        public $forma_pago;
        public $costo_carrera;
        public $estado_carrera;
        public $id_persona;
        // public $nombre_persona;

        public function setEstadoCarrera(string $estadoCarrera): void
        {
            $this->estado_carrera = $estadoCarrera;
        }

        public function __construct(
            $id_reserva_transporte = null,
            $nombre_cliente = null,
            $contacto_cliente = null,
            $cantidad_personas = null,
            $recoger_de = null,
            $llevar_a = null,
            $fecha = null,
            $hora = null,
            $forma_pago = null,
            $costo_carrera = null,
            $estado_carrera = null,
            $id_persona = null
            // $nombre_persona = null
        )
        {
            $this->id_reserva_transporte=$id_reserva_transporte;
            $this->nombre_cliente=$nombre_cliente;
            $this->contacto_cliente=$contacto_cliente;
            $this->cantidad_personas=$cantidad_personas;
            $this->recoger_de=$recoger_de;
            $this->llevar_a=$llevar_a;
            $this->fecha_reserva=$fecha;
            $this->hora_reserva=$hora;
            $this->forma_pago=$forma_pago;
            $this->costo_carrera=$costo_carrera;
            $this->estado_carrera=$estado_carrera;
            $this->id_persona=$id_persona;
            // $this->nombre_persona=$nombre_persona;

        }
    }

?>