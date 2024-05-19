<?php 

    namespace App\DDD\Application\ReservaTurismo\UseCases;
    use App\DDD\Domain\Reservas\Ports\ReservaTurismoRepository;

    class DeleteReservaTurismoUseCase
    {
        protected $repository;

        public function __construct(ReservaTurismoRepository $repository)
        {
            $this->repository =$repository;
        }

        public function deleteReservaTurismo($id)
        {
            return $this->repository->deleteReservaTurismo($id);
        }
    }

?>