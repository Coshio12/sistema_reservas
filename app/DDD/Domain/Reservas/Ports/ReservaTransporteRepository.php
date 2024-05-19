<?php 

    namespace App\DDD\Domain\Reservas\Ports;

    use App\DDD\Domain\Reservas\Entities\ReservaTransporte;

    interface ReservaTransporteRepository {
        public function addReservaTransporte(ReservaTransporte $reservaTransporte): bool;

        public function updateReservaTransporte($id, ReservaTransporte $reservaTransporte): bool;

        public function deleteReservaTransporte($id): bool;

        public function getReservaTransporte($id): ReservaTransporte|null;

        public function getReservasTransporte($id): array;

        public function getReservaTransporteAll() :array;

        public function getLastReservaTransporteId() : int;
        
        public function updateEstadoReservaTransporte(int $idReservaTransporte, string $nuevoEstado): bool;


    }

?>