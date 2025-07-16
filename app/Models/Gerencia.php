<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gerencia extends Model{

    use HasFactory;
    protected $table = "gerencia";
    
    protected $primaryKey = "cod_empresa, cod_direccion, cod_gerencia";
    public $timestamps = false;

    protected $fillable = [
        
        'cod_empresa',
        'cod_direccion',
        'cod_gerencia',
        'nb_gerencia',
        'fecha inactivacion',
    ];

    public function get_gerencias($codigo_empresa, $codigo_direccion, $codigo_gerencia, 
                                    $nombre_empresa, $nombre_direccion, $nombre_gerencia) {
        $resultado = self::select(
                    'gerencia.cod_empresa',
                    'gerencia.cod_direccion',
                    'gerencia.cod_gerencia',
                    'gerencia.nb_gerencia',
                    'empresa.nb_empresa as nombre_empresa',
                    'direccion.nb_direccion as nombre_direccion')
                    ->join('empresa', 'gerencia.cod_empresa', '=', 'empresa.cod_empresa')
                    ->join('direccion', 'gerencia.cod_direccion', '=', 'direccion.cod_direccion');
                    if($codigo_empresa != null){
                        $resultado->where('gerencia.cod_empresa', $codigo_empresa);
                    }
                    if($codigo_direccion != null){
                        $resultado->where('gerencia.cod_direccion', $codigo_direccion);
                    }
                    if($codigo_gerencia != null){
                        $resultado->where('gerencia.cod_gerencia', $codigo_gerencia);
                    }
                    if($nombre_empresa != null){
                        $resultado->whereRaw('LOWER(empresa.nb_empresa) LIKE ?', ['%' . strtolower($nombre_empresa) . '%']);
                    }
                    if($nombre_direccion != null){
                        $resultado->whereRaw('LOWER(direccion.nb_direccion) LIKE ?', ['%' . strtolower($nombre_direccion) . '%']);
                    }
                    if($nombre_gerencia != null){
                        $resultado->whereRaw('LOWER(gerencia.nb_gerencia) LIKE ?', ['%' . strtolower($nombre_gerencia) . '%']);
                    } else {
                        $resultado->limit(100);
                    }
                    $resultado->orderBy('gerencia.cod_empresa', 'desc')
                                ->distinct()
                                ->get();

        return $resultado;
    }

    public function get_gerencia_direccion($codigo_empresa, $codigo_direccion) {
        $resultado = self::select('gerencia.cod_gerencia',
                    'gerencia.nb_gerencia')
                    ->where('gerencia.cod_empresa', $codigo_empresa)
                    ->where('gerencia.cod_direccion', $codigo_direccion)
                    ->distinct()
                    ->get();

        return $resultado;
    }

    public function GetGerenciaPorId($codigo_empresa, $codigo_direccion, $codigo_gerencia) {
        $resultado = self::select('gerencia.cod_empresa',
                    'gerencia.cod_direccion',
                    'gerencia.cod_gerencia',
                    'gerencia.nb_gerencia',

                    'empresa.nb_empresa as nombre_empresa',
                    'direccion.nb_direccion as nombre_direccion')
                ->join('empresa', 'gerencia.cod_empresa', '=', 'empresa.cod_empresa')
                ->join('direccion', 'gerencia.cod_direccion', '=', 'direccion.cod_direccion')
                ->where('gerencia.cod_empresa', $codigo_empresa)
                ->where('gerencia.cod_direccion', $codigo_direccion)
                ->where('gerencia.cod_gerencia',  $codigo_gerencia)
                ->first();

        return $resultado;
    }
}