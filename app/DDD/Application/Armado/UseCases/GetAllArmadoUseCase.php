<?php 

    namespace App\DDD\Application\Armado\UseCases;

    use App\DDD\Domain\Reservas\Ports\ArmadoRepository;

    class GetAllArmadoUseCase
    {
        protected $repository;

        public function __construct(ArmadoRepository $repository)
        {
            $this->repository = $repository;
        }

        public function getArmadoAll() : array
        {
            return $this->repository->getArmadoAll();
        }
    }

?>