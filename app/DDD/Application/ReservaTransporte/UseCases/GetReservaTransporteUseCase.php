<?php 

    namespace App\DDD\Application\ReservaTransporte\UseCases;

    use App\DDD\Domain\Reservas\Ports\ReservaTransporteRepository;
    use App\DDD\Domain\Reservas\Entities\ReservaTransporte;
use SebastianBergmann\Type\NullType;

    class GetReservaTransporteUseCase
    {
        protected $repository;

        public function __construct(ReservaTransporteRepository $repository)
        {
            $this->repository = $repository;
        }

        public function getReservaTransporte($id) : ReservaTransporte|NullType
        {
            return $this->repository->getReservaTransporte($id);
        }
    }

?>