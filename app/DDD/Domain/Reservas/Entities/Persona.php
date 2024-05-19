<?php 
//id_persona
//nombre_persona
//apellido_persona
//celular_persona
//correo_persona
namespace App\DDD\Domain\Reservas\Entities;

    class Persona
    {
        public $id_persona;
        public $nombre_persona;
        public $apellido_persona;
        public $celular_persona;
        public $correo_persona;

        public function __construct(
            $id_persona = null,
            $nombre_persona = null,
            $apellido_persona = null,
            $celular_persona = null,
            $correo_persona = null
        )
        {
            $this->id_persona = $id_persona;
            $this->nombre_persona = $nombre_persona;
            $this->apellido_persona = $apellido_persona;
            $this->celular_persona = $celular_persona;
            $this->correo_persona = $correo_persona;
        }
    }



?>