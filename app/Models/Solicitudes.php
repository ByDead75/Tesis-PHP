<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitudes extends Model{

    use HasFactory;
    protected $table = "solicitudes";
    
    protected $primaryKey = "id_solicitud";
    public $timestamps = false;
    protected $casts = [
        'fecha_solicitud' => 'datetime:d-m-Y', // Formatea al serializar a JSON
        //'fecha_firma1' => 'datetime:Y-m-d',
    ];

    protected $fillable = [
        
        'id_solicitud',
        'fecha_solicitud',
        'cod_empresa',
        'centro_de_costo',
        'id_solicitante',
        'cod_departamento',
        'concepto_de_pago',
        'beneficiario_de_pago',
        'id_pago',
        'id_banco',
        'cuenta',
        'factura',
        'n_control',
        'monto',
        'monto_iva',
        'monto_total',
        'observaciones',
        'status_solicitud',
        'rif',
        'cod_sucursal',
        'cod_direccion',
        'firma',
        'fecha_firma_1',
        'fecha_firma_2',
        'fecha_firma_3',
        'factupuesto',
        'imagen',
        'aprobador_sol',
        'firma_1',
        'firma_2',
        'firma_3',
        'TipoProveedor',
        'fecha_firma_4',
        'firma_4',
    ];

    public function get_solicitudes($id_solicitud, $id_solicitante, $status_solicitud, $fecha_desde, $fecha_hasta) {
        $resultado = self::select('solicitudes.id_pago', 
                'solicitudes.id_solicitud',
                'solicitudes.fecha_solicitud',
                'solicitudes.id_solicitante', 
                'solicitudes.rif',
                'solicitudes.monto_total',
                'solicitudes.status_solicitud',
                'empleados1.nombre as nombre_solicitante' )
                ->join('empleados1', 'solicitudes.id_solicitante', '=', 'empleados1.cedula');
                if($id_solicitud != null){
                    $resultado->where('solicitudes.id_solicitud', $id_solicitud);
                }
                if($id_solicitante != null){
                    $resultado->where('solicitudes.id_solicitante', $id_solicitante);
                }
                if($status_solicitud != null){
                    $resultado->where('solicitudes.status_solicitud', $status_solicitud);
                }
                if ($fecha_desde != null) {
                    $resultado->whereBetween('solicitudes.fecha_solicitud', [$fecha_desde, $fecha_hasta]);
                }else {
                    $resultado->limit(100);
                }

                $resultado->orderBy('solicitudes.id_solicitud', 'desc')->distinct()
                ->get();

        return $resultado;
    }

    public function GetSolicitudesPorId($id_solicitud) {
        $resultado = self::select('solicitudes.id_solicitud',
                'solicitudes.fecha_solicitud',
                'solicitudes.cod_empresa',
                'solicitudes.centro_de_costo as codigo_centro_costo',
                'solicitudes.id_solicitante',
                'solicitudes.cod_departamento',
                'solicitudes.concepto_de_pago',
                'solicitudes.beneficiario_de_pago',
                'solicitudes.id_pago', 
                'solicitudes.id_banco',
                'solicitudes.cuenta',
                'solicitudes.factura',
                'solicitudes.n_control',
                'solicitudes.monto',
                'solicitudes.monto_iva',
                'solicitudes.monto_total',
                'solicitudes.observaciones',
                'solicitudes.status_solicitud',
                'solicitudes.rif',
                'solicitudes.cod_sucursal',
                'solicitudes.cod_direccion',
                'solicitudes.firma',
                'solicitudes.fecha_firma_1',
                'solicitudes.fecha_firma_2',
                'solicitudes.fecha_firma_3',
                'solicitudes.factupuesto',
                'solicitudes.imagen',
                'solicitudes.aprobador_sol',
                'solicitudes.firma_1',
                'solicitudes.firma_2',
                'solicitudes.firma_3',
                'solicitudes.TipoProveedor',
                'solicitudes.fecha_firma_4',
                'solicitudes.firma_4',

                'empresa.nb_empresa as nombre_empresa',
                'sucursales.NB_SUCURSAL as sucursal',
                'centro_costo.centro as nombre_centro_costo',
                'empleados1.nombre as nombre_solicitante',
                'aprobador.nombre as nombre_aprobador',
                
                'proveedores.nb_auxiliar as nombre_proveedor',
                'bancos.nb_banco as banco_nombre',
                )
                ->join('empleados1 as aprobador', 'solicitudes.aprobador_sol', '=', 'aprobador.cedula') 
                ->join('empresa', 'solicitudes.cod_empresa', '=', 'empresa.cod_empresa')
                ->join('sucursales', 'solicitudes.cod_sucursal', '=', 'sucursales.COD_SUCURSAL')
                ->join('centro_costo', 'solicitudes.centro_de_costo', '=', 'centro_costo.id_centro')
                ->join('empleados1', 'solicitudes.id_solicitante', '=', 'empleados1.cedula')
                ->join('proveedores', 'solicitudes.beneficiario_de_pago', '=', 'proveedores.cod_auxiliar')
                ->join('bancos', 'solicitudes.id_banco', '=', 'bancos.cod_banco')
                ->where('solicitudes.id_solicitud', $id_solicitud)
                ->first();

        return $resultado;
    }
}