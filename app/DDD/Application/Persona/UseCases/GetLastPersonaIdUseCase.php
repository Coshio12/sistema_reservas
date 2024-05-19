<?php 
namespace App\DDD\Application\Persona\UseCases;

use App\DDD\Domain\Reservas\Ports\PersonaRepository;

class GetLastPersonaIdUseCase
{
    protected $repository;

    public function __construct(PersonaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getLastPersonaId()
    {
        return $this->repository->getLastPersonaId();
    }
}