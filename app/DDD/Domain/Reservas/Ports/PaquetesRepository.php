<?php 

    namespace App\DDD\Domain\Reservas\Ports;

    use App\DDD\Domain\Reservas\Entities\Paquetes;

    interface PaquetesRepository
    {
        public function addPaquete(Paquetes $paquetes) : bool;

        public function updatePaquete($id, Paquetes $paquetes) :  bool;

        public function deletePaquete($id) : bool;

        public function getPaquete($id): Paquetes|null;

        public function getPaqueteAll() : array;

        public function getLastPaqueteId() : int;
    }

?>