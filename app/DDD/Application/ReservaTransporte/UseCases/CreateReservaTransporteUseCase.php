<?php 

    namespace App\DDD\Application\ReservaTransporte\UseCases;

    use App\DDD\Domain\Reservas\Ports\ReservaTransporteRepository;
    use App\DDD\Domain\Reservas\Entities\ReservaTransporte;
        

    class CreateReservaTransporteUseCase
    {
        protected $repository;

        public function __construct(ReservaTransporteRepository $repository)
        {
            $this->repository = $repository;
        }        

        public function createReservaTransporte(array $attributes= []): ReservaTransporte
        {
            $reservaTransporte = new ReservaTransporte();

            $reservaTransporte->nombre_cliente = $attributes['nombre_cliente'];
            $reservaTransporte->contacto_cliente = $attributes['contacto_cliente'];
            $reservaTransporte->cantidad_personas = $attributes['cantidad_personas'];
            $reservaTransporte->recoger_de = $attributes['recoger_de'];
            $reservaTransporte->llevar_a = $attributes['llevar_a'];
            $reservaTransporte->fecha_reserva = $attributes['fecha_reserva'];
            $reservaTransporte->hora_reserva = $attributes['hora_reserva'];
            $reservaTransporte->forma_pago = $attributes['forma_pago'];
            $reservaTransporte->costo_carrera = $attributes['costo_carrera'];
            $reservaTransporte->estado_carrera = $attributes['estado_carrera'];
            $reservaTransporte->id_persona = $attributes['id_persona'];

            return $reservaTransporte;
        }
    }

?>