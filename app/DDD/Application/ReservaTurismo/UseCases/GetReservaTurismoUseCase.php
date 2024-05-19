<?php 

    namespace App\DDD\Application\ReservaTurismo\UseCases;

    use App\DDD\Domain\Reservas\Entities\ReservaTurismo;
    use App\DDD\Domain\Reservas\Ports\ReservaTurismoRepository;
    use SebastianBergmann\Type\NullType;

    class GetReservaTurismoUseCase
    {
        protected $repository;

        public function __construct(ReservaTurismoRepository $repository)
        {
            $this->repository = $repository;
        }

        public function getReservaTurismo($id): ReservaTurismo|NullType
        {
            return $this->repository->getReservaTurismo($id);
        }
    }

?>