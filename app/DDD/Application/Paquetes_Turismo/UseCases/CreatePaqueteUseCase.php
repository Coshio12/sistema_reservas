<?php 

    namespace App\DDD\Application\Paquetes_Turismo\UseCases;

    use App\DDD\Domain\Reservas\Entities\Paquetes;
    use App\DDD\Domain\Reservas\Ports\PaquetesRepository;

    class CreatePaqueteUseCase
    {
        protected $repository;

        public function __construct(PaquetesRepository $repository)
        {
            $this->repository =$repository;
        }

        public function createPaquete(array $attributes = []): Paquetes
        {
            $paquetes = new Paquetes();

            // $paquetes->id_paquetes = $attributes['id_paquetes'];
            $paquetes->nombre_paquetes = $attributes['nombre_paquetes'];
            $paquetes->descripcion_paquetes = $attributes['descripcion_paquetes'];

            return $paquetes;
        
        }
    }

?>