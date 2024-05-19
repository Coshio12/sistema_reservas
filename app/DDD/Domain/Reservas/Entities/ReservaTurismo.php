<?php 

    namespace App\DDD\Domain\Reservas\Entities;

    class ReservaTurismo
    {
        public $id_reserva_turismo;
        public $nombre_cliente;
        public $contacto_cliente;
        public $fecha_reserva;
        public $hora_inicio;
        public $hora_final;
        public $guia_encargado;
        public $cantidad_personas;
        public $costo_turismo;
        public $estado_carrera;
        public $id_paquetes;
        public $id_persona;

        public function __construct(
            $id_reserva_turismo = null,
            $nombre_cliente = null,
            $contacto_cliente = null,
            $fecha_reserva = null,
            $hora_inicio = null,
            $hora_final = null,
            $guia_encargado = null,
            $cantidad_personas = null,
            $costo_turismo = null,
            $estado_carrera = null,
            $id_paquetes=null,
            $id_persona = null
        )
        {
            $this->id_reserva_turismo=$id_reserva_turismo;
            $this->nombre_cliente=$nombre_cliente;
            $this->contacto_cliente=$contacto_cliente;
            $this->fecha_reserva=$fecha_reserva;
            $this->hora_inicio=$hora_inicio;
            $this->hora_final=$hora_final;
            $this->guia_encargado=$guia_encargado;
            $this->cantidad_personas=$cantidad_personas;
            $this->costo_turismo=$costo_turismo;
            $this->estado_carrera=$estado_carrera;
            $this->id_paquetes=$id_paquetes;
            $this->id_persona=$id_persona;
        }
    }

?>