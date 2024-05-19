<?php 

    namespace App\DDD\Application\Paquetes_Turismo\UseCases;


    use App\DDD\Domain\Reservas\Ports\PaquetesRepository;

    class DeletePaqueteUseCase
    {
        protected $repository;

        public function __construct(PaquetesRepository $repository)
        {
            $this->repository = $repository;
        }

        public function deletePaquete($id){
            return $this->repository->deletePaquete($id);
        }
    }

?>