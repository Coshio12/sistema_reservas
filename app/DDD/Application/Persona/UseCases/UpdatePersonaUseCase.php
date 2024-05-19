<?php 
    namespace App\DDD\Application\Persona\UseCases;

    use App\DDD\Domain\Reservas\Entities\Persona;
    use App\DDD\Domain\Reservas\Ports\PersonaRepository;

    class UpdatePersonaUsecase
    {
        protected $repository;

        public function __construct(PersonaRepository $repository)
        {
            $this->repository = $repository;
        }

        public function updatePersona($id , Persona $persona)
        {
            return $this->repository->updatePersona($id, $persona);
        }
    }
?>