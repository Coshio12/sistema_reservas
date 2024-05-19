<?php 

    namespace App\DDD\Application\Paquetes_Turismo\UseCases;

    use App\DDD\Domain\Reservas\Entities\Paquetes;
    use App\DDD\Domain\Reservas\Ports\PaquetesRepository;
    use SebastianBergmann\Type\NullType;

    class GetPaqueteUseCase
    {
        protected $repository;

        public function __construct(PaquetesRepository $repository)
        {
            $this->repository = $repository;
        }

        public function getPaquete($id) : Paquetes|NullType
        {
            return $this->repository->getPaquete($id);
        }
    }





?>