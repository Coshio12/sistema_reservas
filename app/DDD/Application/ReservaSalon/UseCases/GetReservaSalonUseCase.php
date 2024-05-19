<?php 

namespace App\DDD\Application\ReservaSalon\UseCases;

    use App\DDD\Domain\Reservas\Ports\ReservaSalonRepository;
    use App\DDD\Domain\Reservas\Entities\ReservaSalon;
    use SebastianBergmann\Type\NullType;

    class GetReservaSalonUseCase
    {
        protected $repository;

        public function __construct(ReservaSalonRepository $repository)
        {
            $this->repository = $repository;
        }

        public function getReservaSalon($id) : ReservaSalon|NullType
        {
            return $this->repository->getReservaSalon($id);
        }
    }

?>