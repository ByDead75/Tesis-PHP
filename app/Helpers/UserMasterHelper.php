<?php

namespace App\Helpers;

class UserMasterHelper
{
    
    public static function getUserMaster(int $userMasterId)
    {
        $userMaster = "";

        switch ($userMasterId) {
            case 0:
                $userMaster = 'Empleado';
                break;
            case 1:
                $userMaster = 'Supervisor';
                break;
            case 2:
                $userMaster = 'Director';
                break;
            case 3:
                $userMaster = 'Gerente';
                break;
            case 4:
                $userMaster = 'Administrador';
                break;
            case 6:
                $userMaster = 'Superadministrador';
                break;
            default:
                $userMaster = 'Empleado';
                break;
        }
        return $userMaster;
    }
}