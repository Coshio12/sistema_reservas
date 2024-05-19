<?php 

    namespace App\DDD\Domain\Reservas\Ports;

    use App\DDD\Domain\Reservas\Entities\ReservaSalon;

    interface ReservaSalonRepository
    {
        public function addReservaSalon(ReservaSalon $reservaSalon): bool;

        public function updateReservaSalon($id, ReservaSalon $reservaSalon): bool;

        public function deleteReservaSalon($id): bool;

        public function getReservaSalon($id): ReservaSalon|null;

        public function getReservasSalon($id): array;

        public function getReservaSalonAll() : array;

        public function getLastReservaSalonId() : int;

    }

?>