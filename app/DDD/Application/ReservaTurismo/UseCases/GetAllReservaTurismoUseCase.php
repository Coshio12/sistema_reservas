<?php 

    namespace App\DDD\Application\ReservaTurismo\UseCases;

    use App\DDD\Domain\Reservas\Ports\ReservaTurismoRepository;

    class GetAllReservaTurismoUseCase
    {
        protected $repository;

        public function __construct(ReservaTurismoRepository $repository)
        {
            $this->repository =$repository;
        }

        public function getReservaTurismoAll() : array
        {
            return $this->repository->getReservaTurismoAll();
        }
    }

?>