<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados1 extends Model{

    use HasFactory;
    protected $table = "empleados1";
    
    protected $primaryKey = "cod_trabajador, cod_empresa";

    public $timestamps = false;

    protected $fillable = [
        
        'cedula',
        'nombre',
        'fecha_nacimiento',
        'cod_direccion',
        'cod_gerencia',
        'cod_departamento',
        'cod_trabajador',
        'cod_empresa',
        'cod_cargo',
        'nb_cargo',
        'fecha_ingreso',
        'fecha_egreso',
        'cod_sucursal',
        'user_master',  
        'email',
        'firma_digitaL',
        'UID_centro',
        'cod_centro_costo',
    ];
}