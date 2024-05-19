<?php 

    namespace App\DDD\Application\ReservaTransporte\UseCases;

    use App\DDD\Domain\Reservas\Ports\ReservaTransporteRepository;
    use App\DDD\Domain\Reservas\Entities\ReservaTransporte;
    

    class AddReservaTransporteUseCase
    {
        protected $repository;

        public function __construct(ReservaTransporteRepository $repositorio)
        {
            $this->repository = $repositorio;
        }

        public function addReservaTransporte(ReservaTransporte $reservaTransporte) : bool
        {
            return $this->repository->addReservaTransporte($reservaTransporte);
        }
    }

?>