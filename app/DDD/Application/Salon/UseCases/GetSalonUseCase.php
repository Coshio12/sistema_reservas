<?php 

    namespace App\DDD\Application\Salon\UseCases;

    use App\DDD\Domain\Reservas\Entities\Salon;
    use App\DDD\Domain\Reservas\Ports\SalonRepository;
    use SebastianBergmann\Type\NullType;

    class GetSalonUseCase
    {
        protected $repository;

        public function __construct(SalonRepository $repository)
        {
            $this->repository = $repository;
        }

        public function getSalon($id) : Salon|NullType
        {
            return $this->repository->getSalon($id);
        }
    }

?>