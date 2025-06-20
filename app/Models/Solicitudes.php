<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitudes extends Model{

    use HasFactory;
    protected $table = "solicitudes";
    
    protected $primaryKey = "id_solicitud";
    public $timestamps = false;

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
        'fecha_firma1',
        'fecha_firma2',
        'fecha_firma3',
        'factupuesto',
        'imagen',
        'aprobador_sol',
        'firma_1',
        'firma_2',
        'firma_3',
        'TipoProveedor',
        'fecha_firma4',
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

                $resultado->orderBy('solicitudes.fecha_solicitud', 'desc')->distinct()
                ->get();

        return $resultado;
    }


    public function GetSolicitudesPorId($id_solicitud) {
        $resultado = self::select('solicitudes.id_pago', 
                'solicitudes.id_solicitud',
                'solicitudes.fecha_solicitud',
                'solicitudes.id_solicitante', 
                'solicitudes.rif',
                'solicitudes.monto_total',
                'solicitudes.status_solicitud',
                'empleados1.nombre as nombre_solicitante' )
                ->join('empleados1', 'solicitudes.id_solicitante', '=', 'empleados1.cedula')
                ->where('solicitudes.id_solicitud', $id_solicitud)
                ->first();

        return $resultado;
    }
}