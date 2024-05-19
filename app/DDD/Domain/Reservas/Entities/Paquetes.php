<?php 
//

    namespace App\DDD\Domain\Reservas\Entities;

    class Paquetes
    {
        public $id_paquetes;
        public $nombre_paquetes;
        public $descripcion_paquetes;

        public function __construct(
            $id_paquetes = null,
            $nombre_paquetes = null,
            $descripcion_paquetes = null
        )
        {
            $this->id_paquetes = $id_paquetes;
            $this->nombre_paquetes = $nombre_paquetes;
            $this->descripcion_paquetes = $descripcion_paquetes;
        }

    }
    

?>