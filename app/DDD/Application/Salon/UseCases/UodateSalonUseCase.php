<?php 

    namespace App\DDD\Application\Salon\UseCases;

    use App\DDD\Domain\Reservas\Entities\Salon;
    use App\DDD\Domain\Reservas\Ports\SalonRepository;

    class UpdateSalonUseCase
    {
        protected $repository;

        public function __construct(SalonRepository $repository)
        {
            $this->repository =$repository;
        }

        public function updateSalon($id, Salon $salon)
        {
            return $this->repository->updateSalon($id,$salon);
        }
    }

?>