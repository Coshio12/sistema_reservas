<?php 

    namespace App\DDD\Application\Salon\UseCases;

    use App\DDD\Domain\Reservas\Entities\Salon;
    use App\DDD\Domain\Reservas\Ports\SalonRepository;

    class AddSalonUseCase
    {
        protected $repository;

        public function __construct(SalonRepository $repository)
        {
            $this->repository = $repository;
        }

        public function addSalon(Salon $salon): bool
        {
            return $this->repository->addSalon($salon);
        }
    }

?>