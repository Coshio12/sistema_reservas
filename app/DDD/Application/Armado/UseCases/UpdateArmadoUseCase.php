<?php 

    namespace App\DDD\Application\Armado\UseCases;

    use App\DDD\Domain\Reservas\Entities\Armado;
    use App\DDD\Domain\Reservas\Ports\ArmadoRepository;

    class UpdateArmadoUseCase
    {
        protected $repository;

        public function __construct(ArmadoRepository $repository)
        {
            $this->repository = $repository;
        }

        public function updateArmado($id, Armado $armado)
        {
            return $this->repository->updateArmado($id, $armado);
        }
    }

?>