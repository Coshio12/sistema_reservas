<?php 

    namespace App\DDD\Application\Salon\UseCases;

    use App\DDD\Domain\Reservas\Entities\Salon;
    use App\DDD\Domain\Reservas\Ports\SalonRepository;

    class DeleteSalonUseCase
    {
        protected $repository;

        public function __construct(SalonRepository $repository)
        {
            $this->repository = $repository;
        }

        public function deleteSalon($id)
        {
            return $this->repository->deleteSalon($id);
        }
    }

?>