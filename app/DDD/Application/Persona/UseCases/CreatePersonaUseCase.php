<?php 
    namespace App\DDD\Application\Persona\UseCases;

    use App\DDD\Domain\Reservas\Entities\Persona;
    use App\DDD\Domain\Reservas\Ports\PersonaRepository;
    
    class CreatePersonaUseCase
    {
        protected $repository;

        public function __construct(PersonaRepository $repository)
        {
            $this->repository = $repository;
        }

        public function createPersona(array $attributes = []): Persona
        {
            $persona = new Persona();
            //$persona->id_persona = $attributes['id_persona'];
            $persona->nombre_persona = $attributes['nombre_persona'];
            $persona->apellido_persona = $attributes['apellido_persona'];
            $persona->celular_persona = $attributes['celular_persona'];
            $persona->correo_persona = $attributes['correo_persona'];

            return $persona;
            
            
        }
    }

?>