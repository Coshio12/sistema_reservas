<?php 

    namespace App\DDD\Domain\Reservas\Entities;

    class Armado
    {
        public $id_armado;
        public $nombre_armado;

        public function __construct(
            $id_armado = null,
            $nombre_armado = null
        )
        {
            $this->id_armado = $id_armado;
            $this->nombre_armado = $nombre_armado;

        }
    }

?>