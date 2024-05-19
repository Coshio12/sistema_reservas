<?php 

    namespace app\DDD\Application\ReservaTransporte\UseCases;

    use App\DDD\Domain\Reservas\Ports\ReservaTransporteRepository;

    class GetLastReservaTransporte
    {
        protected $repository;

        public function __construct(ReservaTransporteRepository $repository)
        {
            $this->repository = $repository;
        }

        public function getLastReservaTransporteId()
        {
            return $this->repository->getLastReservaTransporteId();
        }
    }

?>