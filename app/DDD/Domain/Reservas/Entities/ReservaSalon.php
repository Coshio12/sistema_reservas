<?php 

    namespace App\DDD\Domain\Reservas\Entities;

    class ReservaSalon
    {
        public $id_reserva_salon;
        public $nombre_evento;
        public $nombre_cliente;
        public $celular_cliente;
        public $tipo_cliente;
        public $fecha_reserva;
        public $hora_inicio;
        public $hora_final;
        public $horas_totales;
        public $tipo_periodo;
        public $costo_salon;
        public $estado_reserva;
        public $id_persona;
        public $id_salon;
        public $id_armado;

        public function __construct(
            $id_reserva_salon = null,
            $nombre_evento = null,
            $nomobre_cliente = null,
            $celular_cliente = null,
            $tipo_cliente = null,
            $fecha_reserva = null,
            $hora_inicio = null,
            $hora_final = null,
            $horas_totales = null,
            $tipo_periodo = null,
            $costo_salon = null,
            $estado_reserva = null,
            $id_persona = null,
            $id_salon = null,
            $id_armado = null
        )
        {
            $this->id_reserva_salon=$id_reserva_salon;
            $this->nombre_evento=$nombre_evento;
            $this->nombre_cliente=$nomobre_cliente;
            $this->celular_cliente=$celular_cliente;
            $this->tipo_cliente=$tipo_cliente;
            $this->fecha_reserva=$fecha_reserva;
            $this->hora_inicio=$hora_inicio;
            $this->hora_final=$hora_final;
            $this->horas_totales=$horas_totales;
            $this->tipo_periodo=$tipo_periodo;
            $this->costo_salon=$costo_salon;
            $this->estado_reserva=$estado_reserva;
            $this->id_persona=$id_persona;
            $this->id_salon=$id_salon;
            $this->id_armado=$id_armado;
        }
    }

?>