<?php 

    namespace App\DDD\Application\Armado\UseCases;

    use App\DDD\Domain\Reservas\Entities\Armado;
    use App\DDD\Domain\Reservas\Ports\ArmadoRepository;

    class AddArmadoUseCase
    {
        protected $repository;

        public function __construct(ArmadoRepository $repository)
        {
            $this->repository = $repository;
        }

        public function addArmado(Armado $armado): bool
        {
            return $this->repository->addArmado($armado);
        }
    }

?>