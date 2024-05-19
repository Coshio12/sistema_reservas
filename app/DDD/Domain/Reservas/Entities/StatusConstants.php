<?php

namespace App\DDD\Domain\Reservas\Entities;

class StatusConstants
{
    const STATUS_COMPLETED = 0;
    const STATUS_PENDING = 1;
    const STATUS_CANCELED = 2;

    const STATUS_TEXT_COMPLETED = 'Completado';
    const STATUS_TEXT_PENDING = 'Pendiente';
    const STATUS_TEXT_CANCELED = 'Cancelado';
}
