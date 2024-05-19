<?php 

    namespace App\DDD\Domain\Reservas\Entities;

    class Salon
    {
        public $id_salon;
        public $nombre_salon;
        public $capacidad_salon;
        public $descripcion_salon;

        public function __construct(
            $id_salon = null,
            $nombre_salon = null,
            $capacidad_salon = null,
            $descripcion_salon = null
        )
        {
            $this->id_salon = $id_salon;
            $this->nombre_salon = $nombre_salon;
            $this->capacidad_salon = $capacidad_salon;
            $this->descripcion_salon = $descripcion_salon;
        }
    }

?>