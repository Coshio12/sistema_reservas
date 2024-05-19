<?php 

    namespace App\DDD\Application\ReservaTurismo\UseCases;

    use App\DDD\Domain\Reservas\Ports\ReservaTurismoRepository;

    class getLastReservaTurismoIdUseCase
    {
        protected $repository;

        public function __construct(ReservaTurismoRepository $repository)
        {
            $this->repository = $repository;
        }

        public function getLastReservaTurismoId()
        {
            return $this->repository->getLastReservaTurismoId();
        }
    }

?>