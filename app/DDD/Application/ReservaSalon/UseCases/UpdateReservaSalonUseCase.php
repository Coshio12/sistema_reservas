<?php 

namespace App\DDD\Application\ReservaSalon\UseCases;

    use App\DDD\Domain\Reservas\Entities\ReservaSalon;
    use App\DDD\Domain\Reservas\Ports\ReservaSalonRepository;

    class UpdateReservaSalonUseCase
    {
        protected $repository;

        public function __construct(ReservaSalonRepository $repository)
        {
            $this->repository = $repository;
        }

        public function updateReservaSalon($id, ReservaSalon $reservaSalon)
        {
            return $this->repository->updateReservaSalon($id, $reservaSalon);
        }
    }

?>