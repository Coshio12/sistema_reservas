<?php 

    namespace App\DDD\Application\Salon\UseCases;

    use App\DDD\Domain\Reservas\Entities\Salon;
    use App\DDD\Domain\Reservas\Ports\SalonRepository;

    class CreateSalonUseCase
    {
        protected $repository;

        public function __construct(SalonRepository $repository)
        {
            $this->repository = $repository;
        }

        public function createSalon(array $attributes = []):Salon
        {
            $salon = new Salon();

            $salon->nombre_salon = $attributes['nombre_salon'];
            $salon->capacidad_salon = $attributes['capacidad_salon'];
            $salon->descripcion_salon = $attributes['descripcion_salon'];

            return $salon;
        }
    }

?>