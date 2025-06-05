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
}