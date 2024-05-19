<?php 

namespace App\DDD\Application\ReservaSalon\UseCases;

    use App\DDD\Domain\Reservas\Ports\ReservaSalonRepository;

    class DeleteReservaSalonUseCase
    {
        protected $repository;

        public function __construct(ReservaSalonRepository $repository)
        {
            $this->repository = $repository;
        }

        public function deleteReservaSalon($id)
        {
            return $this->repository->deleteReservaSalon($id);
        }
    }

?>