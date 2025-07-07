<?php

namespace App\Helpers;

class TipoProveedorHelper
{
    
    public static function getTipoProveedor(int $tipoProveedorId)
    {
        $tipoProveedor = "";

        switch ($tipoProveedorId) {
            case '0':
                $tipoProveedor = 'PROSER';
                break;
            case '1':
                $tipoProveedor = 'COMIS';
                break;
            default:
                $tipoProveedor = 'PROSER';
                break;
        }
        return $tipoProveedor;
    }
}