<?php 

    namespace App\DDD\Application\Persona\UseCases;
    use App\DDD\Domain\Reservas\Ports\PersonaRepository;

    class DeletePersonaUseCase
    {
        protected $repository;

        public function __construct(PersonaRepository $repository)
        {
            $this->repository = $repository;
        }

        public function deletePersona($id)
        {
            return $this->repository->deletePersona($id);
        }
    }

?>