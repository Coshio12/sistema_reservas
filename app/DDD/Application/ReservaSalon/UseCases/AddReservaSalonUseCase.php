<?php 

    namespace App\DDD\Application\ReservaSalon\UseCases;

    use App\DDD\Domain\Reservas\Entities\ReservaSalon;
    use App\DDD\Domain\Reservas\Ports\ReservaSalonRepository;

    class AddReservaSalonUseCase
    {
        protected $repository;

        public function __construct(ReservaSalonRepository $repository)
        {
            $this->repository = $repository;
        }

        public function addReservaSalon(ReservaSalon $reservaSalon) : bool
        {
            return $this->repository->addReservaSalon($reservaSalon);
        }
    }

?>