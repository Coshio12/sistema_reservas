<?php 

    namespace App\DDD\Domain\Reservas\Ports;
    use App\DDD\Domain\Reservas\Entities\Armado;

    interface ArmadoRepository
    {
        public function addArmado(Armado $armado) : bool;

        public function updateArmado($id, Armado $armado) : bool;

        public function deleteArmado($id): bool;

        public function getArmado($id): Armado|null;

        public function getArmadoAll(): array;
    }

?>