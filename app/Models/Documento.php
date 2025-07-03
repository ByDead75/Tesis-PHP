<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model{

    use HasFactory;
    protected $table = "documentos";
    
    protected $primaryKey = "id";

    public $timestamps = false;

    protected $fillable = [
        
        'id',
        'nombre_documento',
        'id_factura',
        'id_usuario',
        'tipo_documento',
        'fecha_registro',
        'ruta',
        'observacion',
    ];
}