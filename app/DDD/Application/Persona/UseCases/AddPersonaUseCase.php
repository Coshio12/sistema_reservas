<?php 

namespace App\DDD\Application\Persona\UseCases;

use App\DDD\Domain\Reservas\Entities\Persona;
use App\DDD\Domain\Reservas\Ports\PersonaRepository;


class AddPersonaUseCase{
    protected $repository;

    public function __construct(PersonaRepository $repositorio)
    {
        $this->repository = $repositorio;
    }

    public function addPersona(Persona $persona) : bool
    {
        return $this->repository->addPersona($persona);
    }
}

?>