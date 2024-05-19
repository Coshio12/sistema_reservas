<?php 

namespace App\DDD\Application\ReservaSalon\UseCases;

    use App\DDD\Domain\Reservas\Ports\ReservaSalonRepository;
    use App\DDD\Domain\Reservas\Entities\ReservaSalon;

    class CreateReservaSalonUseCase
    {
        protected $repository;

        public function __construct(ReservaSalonRepository $repository)
        {
            $this->repository = $repository;
        }

        public function createReservaSalon(array $attributes=[]):ReservaSalon
        {
            $reservaSalon = new ReservaSalon();

            $reservaSalon->nombre_evento = $attributes['nombre_evento'];
            $reservaSalon->nombre_cliente = $attributes['nombre_cliente'];
            $reservaSalon->celular_cliente = $attributes['celular_cliente'];
            $reservaSalon->tipo_cliente = $attributes['tipo_cliente'];
            $reservaSalon->fecha_reserva = $attributes['fecha_reserva'];
            $reservaSalon->hora_inicio = $attributes['hora_inicio'];
            $reservaSalon->hora_final = $attributes['hora_final'];
            $reservaSalon->horas_totales = $attributes['horas_totales'];
            $reservaSalon->tipo_periodo = $attributes['tipo_periodo'];
            $reservaSalon->costo_salon = $attributes['costo_salon'];
            $reservaSalon->estado_reserva = $attributes['estado_reserva'];
            $reservaSalon->id_persona = $attributes['id_persona'];
            $reservaSalon->id_salon = $attributes['id_salon'];
            $reservaSalon->id_armado = $attributes['id_armado'];



            return $reservaSalon;
        }
    }

?>