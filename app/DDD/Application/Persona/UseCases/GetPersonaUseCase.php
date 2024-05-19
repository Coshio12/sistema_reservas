<?php 
    namespace App\DDD\Application\Persona\UseCases;

    use App\DDD\Domain\Reservas\Entities\Persona;
    use App\DDD\Domain\Reservas\Ports\PersonaRepository;
use SebastianBergmann\Type\NullType;

    class GetPersonaUseCase
    {
        protected $repository;

        public function  __construct(PersonaRepository $repository)
        {
            $this->repository = $repository;
        }

        public function getPersona($id) : Persona|NullType
        {
            return $this->repository->getPersona($id);
        }
            
        
    }
?>