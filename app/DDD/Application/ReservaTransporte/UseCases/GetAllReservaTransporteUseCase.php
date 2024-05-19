<?php 

    namespace App\DDD\Application\ReservaTransporte\UseCases;;

    use App\DDD\Domain\Reservas\Ports\ReservaTransporteRepository;


    class GetAllReservaTransporteUseCase
    {
        protected $repository;

        public function __construct(ReservaTransporteRepository $repository)
        {
            $this->repository =$repository;
        }

        public function getReservaTransporteAll(): array
        {
            return $this->repository->getReservaTransporteAll();
        }
    }

?>