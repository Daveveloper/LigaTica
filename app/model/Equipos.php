<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Array_;

class Equipos extends Model
{
    protected $table = 'equipos';
    protected $guarded = ['id','activo'];

    public function partidos(){
        return $this->belongsTo(Partidos::class,'equipocasa', 'id');
    }

    public function posicion(){
        return $this->belongsTo(Posiciones::class, 'id');
    }

    public function posicionActual($id){
       $listaEquipos = Posiciones::all('equipo_id','puntos','Diferencia');
       $sorted = $listaEquipos->sortByDesc('puntos');

       $lista = $sorted->toArray();
       $contador = 1;
       foreach($lista as $item){
           if($item['equipo_id'] == $id){
                return $contador;
           }else{
               $contador++;
               continue;
           }
       }
    }
}
