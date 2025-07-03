<?php

namespace App\Helpers;

class TipoProveedorHelper
{
    
    public static function getTipoProveedor(int $tipoProveedorId)
    {
        $tipoProveedor = "";

        switch ($tipoProveedorId) {
            case 'PROSER':
                $tipoProveedor = 'PROSER';
                break;
            case 'COMIS':
                $tipoProveedor = 'COMIS';
                break;
            default:
                $tipoProveedor = '';
                break;
        }
        return $tipoProveedor;
    }
}