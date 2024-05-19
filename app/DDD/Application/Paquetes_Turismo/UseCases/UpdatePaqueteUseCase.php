<?php 

    namespace App\DDD\Application\Paquetes_Turismo\UseCases;

    use App\DDD\Domain\Reservas\Entities\Paquetes;
    use App\DDD\Domain\Reservas\Ports\PaquetesRepository;

    class UpdatePaqueteUseCase
    {
        protected $repository;

        public function __construct(PaquetesRepository $repository)
        {
            $this->repository = $repository;
        }

        public function updatePaquete($id, Paquetes $paquetes)
        {
            return $this->repository->updatePaquete($id, $paquetes);
        }
    }

?>