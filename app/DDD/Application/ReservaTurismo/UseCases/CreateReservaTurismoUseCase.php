<?php 

    namespace App\DDD\Application\ReservaTurismo\UseCases;

    use App\DDD\Domain\Reservas\Entities\ReservaTurismo;
    use App\DDD\Domain\Reservas\Ports\ReservaTurismoRepository;

    class CreateReservaTurismoUseCase
    {
        protected $repository;
        
        public function __construct(ReservaTurismoRepository $repository)
        {
            $this->repository = $repository;            
        }

        public function createReservaTurismo(array $attributes = []): ReservaTurismo
        {
            $reservaTurismo = new ReservaTurismo();

            $reservaTurismo->nombre_cliente = $attributes['nombre_cliente'];
            $reservaTurismo->contacto_cliente = $attributes['contacto_cliente'];
            $reservaTurismo->fecha_reserva = $attributes['fecha_reserva'];
            $reservaTurismo->hora_inicio = $attributes['hora_inicio'];
            $reservaTurismo->hora_final = $attributes['hora_final'];
            $reservaTurismo->guia_encargado = $attributes['guia_encargado'];
            $reservaTurismo->cantidad_personas = $attributes['cantidad_personas'];
            $reservaTurismo->costo_turismo = $attributes['costo_turismo'];
            $reservaTurismo->estado_carrera = $attributes['estado_carrera'];
            $reservaTurismo->id_paquetes = $attributes['id_paquetes'];
            $reservaTurismo->id_persona = $attributes['id_persona'];


            return $reservaTurismo;
        }
    }

?>