<?php 
    namespace App\DDD\Application\Persona\UseCases;

    use App\DDD\Domain\Reservas\Ports\PersonaRepository;

    class GetAllPersonaUseCase
    {
        protected $repository;

        public function __construct(PersonaRepository $repository)        
        {
            $this->repository = $repository;
        }

        public function getPersonaAll() : array {
            return $this->repository->getPersonaAll();
        }
    }
?>