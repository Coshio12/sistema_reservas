<?php 

    namespace App\DDD\Application\Armado\UseCases;

use App\DDD\Domain\Reservas\Entities\Armado;
use App\DDD\Domain\Reservas\Ports\ArmadoRepository;

    class DeleteArmadoUseCase
    {
        protected $repository;

        public function __construct(ArmadoRepository $repository)
        {
            $this->repository = $repository;
        }

        public function deleteArmado($id)
        {
            return $this->repository->deleteArmado($id);
        }
    }

?>