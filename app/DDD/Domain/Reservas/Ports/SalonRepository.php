<?php 

    namespace App\DDD\Domain\Reservas\Ports;
    use App\DDD\Domain\Reservas\Entities\Salon;

    interface SalonRepository
    {
        public function addSalon(Salon $salon) : bool;

        public function updateSalon($id, Salon $salon) : bool;

        public function deleteSalon($id) : bool;

        public function getSalon($id) : Salon|null;

        public function getSalonAll() : array;
    }

?>