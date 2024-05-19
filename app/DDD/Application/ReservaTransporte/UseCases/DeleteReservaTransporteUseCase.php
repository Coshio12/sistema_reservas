<?php 

    namespace App\DDD\Application\ReservaTransporte\UseCases;

    use App\DDD\Domain\Reservas\Ports\ReservaTransporteRepository;


    class deleteReservaTransporteUseCase
    {
        protected $repository;

        public function __construct(ReservaTransporteRepository $repository)
        {
            $this->repository = $repository;
        }

        public function deleteReservaTransporte($id)
        {
            return $this->repository->deleteReservaTransporte($id);        
        }
    }

?>