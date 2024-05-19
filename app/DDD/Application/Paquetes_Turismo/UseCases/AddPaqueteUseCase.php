<?php 

    namespace App\DDD\Application\Paquetes_Turismo\UseCases;

    use App\DDD\Domain\Reservas\Entities\Paquetes;
    use App\DDD\Domain\Reservas\Ports\PaquetesRepository;

    class addPaqueteUseCase
    {
        protected $repository;

        public function __construct(PaquetesRepository $repositorio)
        {
            $this->repository = $repositorio;
        }

        public function addPaquete(Paquetes $paquetes): bool
        {
            return $this->repository->addPaquete($paquetes);
        }
    }

?>