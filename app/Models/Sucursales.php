<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursales extends Model{

    use HasFactory;
    protected $table = "sucursales";
    
    protected $primaryKey = "COD_EMPRESA, COD_SUCURSAL";
    public $timestamps = false;

    protected $fillable = [
        
        'COD_EMPRESA',
        'COD_SUCURSAL',
        'NB_SUCURSAL',
        'FECHA_INACTIVACION',
    ];

    public function get_sucursales($codigo_empresa, $nombre_empresa, $codigo_sucursal, $nombre_sucursal) {
        $resultado = self::select('sucursales.COD_EMPRESA',
                    'sucursales.COD_SUCURSAL',
                    'sucursales.NB_SUCURSAL',
                    'empresa.nb_empresa as nombre_empresa')
                    ->join('empresa', 'sucursales.COD_EMPRESA', '=', 'empresa.cod_empresa');
                    if($codigo_empresa != null){
                        $resultado->where('sucursales.COD_EMPRESA', $codigo_empresa);
                    }
                    if($nombre_empresa != null){
                        $resultado->whereRaw('LOWER(empresa.nb_empresa) LIKE ?', ['%' . strtolower($nombre_empresa) . '%']);
                    }
                    if($codigo_sucursal != null){
                        $resultado->where('sucursales.COD_SUCURSAL', $codigo_sucursal);
                    } 
                    if($nombre_sucursal != null){
                        $resultado->whereRaw('LOWER(sucursales.NB_SUCURSAL) LIKE ?', ['%' . strtolower($nombre_sucursal) . '%']);
                    } else {
                        $resultado->limit(100);
                    }
                    $resultado->orderBy('sucursales.COD_EMPRESA', 'asc')
                                ->distinct()
                                ->get();

        return $resultado;
    }

    public function get_sucursales_empresas($codigo_empresa) {
        $resultado = self::select('sucursales.COD_SUCURSAL',
                    'sucursales.NB_SUCURSAL')
                    ->where('sucursales.COD_EMPRESA', $codigo_empresa)
                    ->distinct()
                    ->get();

        return $resultado;
    }

    public function GetSucursalPorId($codigo_empresa, $codigo_sucursal) {
        $resultado = self::select('sucursales.COD_EMPRESA',
                    'sucursales.COD_SUCURSAL',
                    'sucursales.NB_SUCURSAL',
                    'empresa.nb_empresa as nombre_empresa')
                ->join('empresa', 'sucursales.COD_EMPRESA', '=', 'empresa.cod_empresa')
                ->where('sucursales.COD_EMPRESA', $codigo_empresa)
                ->where('sucursales.COD_SUCURSAL', $codigo_sucursal)
                ->first();

        return $resultado;
    }
}