<?php 

    namespace App\DDD\Application\Armado\UseCases;

    use App\DDD\Domain\Reservas\Entities\Armado;
    use App\DDD\Domain\Reservas\Ports\ArmadoRepository;
    use SebastianBergmann\Type\NullType;

    class GetArmadoUseCase
    {
        protected $repository;

        public function __construct(ArmadoRepository $repository)
        {
            $this->repository = $repository;
        }

        public function getArmado($id) : Armado|NullType
        {
            return $this->repository->getArmado($id);
        }
    }

?>