<?php 

    namespace App\DDD\Application\ReservaTurismo\UseCases;

    use App\DDD\Domain\Reservas\Entities\ReservaTurismo;
    use App\DDD\Domain\Reservas\Ports\ReservaTurismoRepository;

    class UpdateReservaTurismoUseCase
    {
        protected $repository;

        public function __construct(ReservaTurismoRepository $repository)
        {
            $this->repository = $repository;
        }

        public function updateReservaTurismo($id, ReservaTurismo $reservaTurismo)
        {
            return $this->repository->updateReservaTurismo($id, $reservaTurismo);
        }
    }

?>