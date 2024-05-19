<?php 

namespace App\DDD\Application\ReservaSalon\UseCases;

use App\DDD\Domain\Reservas\Entities\ReservaSalon;
use App\DDD\Domain\Reservas\Ports\ReservaSalonRepository;

    class GetAllReservaSalonUseCase
    {
        protected $repository;

        public function __construct(ReservaSalonRepository $repository)
        {  
            $this->repository = $repository; 
        }

        public function getReservaSalonAll(): array
        {
            return $this->repository->getReservaSalonAll();
        }
    }

?>