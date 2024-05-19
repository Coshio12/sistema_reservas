<?php 

    namespace App\DDD\Application\ReservaTransporte\UseCases;

    use App\DDD\Domain\Reservas\Entities\ReservaTransporte;
    use App\DDD\Domain\Reservas\Ports\ReservaTransporteRepository;

    class UpdateReservaTransporteUseCase
    {
        protected $repository;

        public function __construct(ReservaTransporteRepository $repository)
        {
            $this->repository = $repository;
        }

        public function updateReservaTransporte($id, ReservaTransporte $reservaTransporte)
        {
            return $this->repository->updateReservaTransporte($id,$reservaTransporte);
        }
    }

?>