<?php 

    namespace App\DDD\Application\ReservaTurismo\UseCases;

    
    use App\DDD\Domain\Reservas\Entities\ReservaTurismo;
    use App\DDD\Domain\Reservas\Ports\ReservaTurismoRepository;

    class AddReservaTurismoUseCase
    {
        protected $repository;

        public function __construct(ReservaTurismoRepository $repository)
        {
            $this->repository =$repository;
        }

        public function addReservaTurismo(ReservaTurismo $reservaTurismo): bool
        {
            return $this->repository->addReservaTurismo($reservaTurismo);
        }
    }

?>