<?php

namespace App\DDD\Application\Reservas;

use App\DDD\Domain\Reservas\Entities\ReservaTransporte;
use App\DDD\Domain\Reservas\Ports\ReservaTransporteRepository;

class CambiarEstadoReservaTransporteUseCase
{
    private $reservaTransporteRepository;

    public function __construct(ReservaTransporteRepository $reservaTransporteRepository)
    {
        $this->reservaTransporteRepository = $reservaTransporteRepository;
    }

    public function cambiarEstadoReserva(int $idReservaTransporte, string $nuevoEstado): bool
    {
        $reservaTransporte = $this->reservaTransporteRepository->getReservaTransporte($idReservaTransporte);

        if (!$reservaTransporte) {
            return false; // No se encontró la reserva
        }

        $estadosValidos = ["completado", "pendiente", "cancelado"];

        if (!in_array($nuevoEstado, $estadosValidos)) {
            return false; // Estado no válido
        }

        $reservaTransporte->setEstadoCarrera($nuevoEstado);

        return $this->reservaTransporteRepository->updateReservaTransporte($idReservaTransporte, $reservaTransporte);
    }
}
