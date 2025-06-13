<?php

namespace App\Helpers;

class StatusHelper
{
    
    public static function getStatus(int $statusId)
    {
        $status = "";

        switch ($statusId) {
            case 1:
                $status = 'APROBADA';
                break;
            case 2:
                $status = 'POR APROBACION';
                break;
            case 3:
                $status = 'RECHAZADA';
                break;
            case 4:
                $status = 'PAGADA';
                break;
            case 5:
                $status = 'RECIBIDO ADM';
                break;
            default:
                $status = 'DESCONOCIDO';
                break;
        }

        return $status;
    }


    /**
     * Retorna solo el color del estatus.
     */
    public static function getStatusColor(int $statusId): string
    {
        $status = "";

        switch ($statusId) {
            case 1:
                $status = 'bg-success';
                break;
            case 2:
                $status = 'bg-warning';
                break;
            case 3:
                $status = 'bg-danger';
                break;
            case 4:
                $status = 'bg-primary';
                break;
            case 5:
                $status = 'bg-warning';
                break;
            default:
                $status = 'bg-secondary';
                break;
        }

        return $status;
    }
}