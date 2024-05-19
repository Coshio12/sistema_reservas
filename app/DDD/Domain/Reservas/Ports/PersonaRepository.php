<?php 

namespace App\DDD\Domain\Reservas\Ports;

use App\DDD\Domain\Reservas\Entities\Persona;

interface PersonaRepository {
    public function addPersona(Persona $persona) : bool;

    public function updatePersona($id, Persona $persona) : bool;

    public function deletePersona($id) : bool;

    public function getPersona($id): Persona|null;

    public function getPersonaAll() :array;

    public function getLastPersonaId(): int;

}



?>