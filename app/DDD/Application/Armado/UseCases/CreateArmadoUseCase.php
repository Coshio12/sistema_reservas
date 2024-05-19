<?php 

    namespace App\DDD\Application\Armado\UseCases;

    use App\DDD\Domain\Reservas\Entities\Armado;
    use App\DDD\Domain\Reservas\Ports\ArmadoRepository;

    class CreateArmadoUseCase
    {
        protected $repository;

        public function __construct(ArmadoRepository $repository)
        {
            $this->repository = $repository;
        }

        public function createArmado(array $attributes = []): Armado
        {
            $armado = new Armado();

            $armado->nombre_armado = $attributes['nombre_armado'];

            return $armado;
        }
    }

?>