<?php 

    namespace App\DDD\Domain\Reservas\Ports;

    use App\DDD\Domain\Reservas\Entities\ReservaTurismo;

    interface ReservaTurismoRepository
    {
        public function addReservaTurismo(ReservaTurismo $reservaTurismo): bool;

        public function updateReservaTurismo($id, ReservaTurismo $reservaTurismo): bool;

        public function deleteReservaTurismo($id): bool;

        public function getReservaTurismo($id): ReservaTurismo|null;

        public function getReservasTurismo($id): array;

        public function getReservaTurismoAll() :  array;

        public function getLastReservaTurismoId() : int;

        // public function updateEstadoReservaTurismo(int $idReservaTurismo, string $nuevoEstado): bool;
    }

?>