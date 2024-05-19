<?php 

    namespace App\DDD\Application\Salon\UseCases;

    use App\DDD\Domain\Reservas\Ports\SalonRepository;

    class GetAllSalonUseCase
    {
        protected $repository;

        public function __construct(SalonRepository $repository)
        {
            $this->repository = $repository;
        }

        public function getSalonAll(): array
        {
            return $this->repository->getSalonAll();
        }
    }

?>