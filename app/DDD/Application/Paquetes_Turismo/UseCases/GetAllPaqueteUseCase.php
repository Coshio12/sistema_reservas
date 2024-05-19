<?php 

    namespace App\DDD\Application\Paquetes_Turismo\UseCases;

    use App\DDD\Domain\Reservas\Ports\PaquetesRepository;

    class GetAllPaqueteUseCase
    {
        protected $repository;

        public function __construct(PaquetesRepository $repository)
        {
            $this->repository = $repository;
        }

        public function getPaqueteAll(): array
        {
            return $this->repository->getPaqueteAll();
        }
    }

?>