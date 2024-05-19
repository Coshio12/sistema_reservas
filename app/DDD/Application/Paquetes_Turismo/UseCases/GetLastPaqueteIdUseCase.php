<?php 

    namespace App\DDD\Application\Paquetes_Turismo\UseCases;

    use App\DDD\Domain\Reservas\Ports\PaquetesRepository;

    class GetLastPersonaIdUseCase
    {
        protected $repository;

        public function __construct(PaquetesRepository $repository)
        {
            $this->repository = $repository;
        }

        public function getLastPaqueteId()
        {
            return $this->repository->getLastPaqueteId();
        }
    }

?>