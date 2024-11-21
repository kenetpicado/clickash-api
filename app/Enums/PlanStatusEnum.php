<?php

namespace App\Enums;

enum PlanStatusEnum: string
{
    case PENDIENTE = 'PENDIENTE';
    case ACTIVO = 'ACTIVO';
    case CANCELADO = 'CANCELADO';
}
