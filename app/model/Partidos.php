<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class partidos extends Model
{
    protected $table = 'partidos';
    protected $guarded = ['id'];



    public function partido($idcasa, $gc, $idvisita, $gv ){
        $casa = Posiciones::findOrFail($idcasa);
        $visita = Posiciones::findOrFail($idvisita);

        //Si gana casa
        if($gc > $gv){
            $casa->puntos += 3;
            $casa->Partidos += 1;
            $casa->PGanaddos +=1;
            $casa->GF += $gc;
            $casa->GC += $gv;
            $casa->diferencia = $casa->GF - $casa->GC;

            $visita->Partidos += 1;
            $visita->PPerdidos +=1;
            $visita->GF += $gv;
            $visita->GC += $gc;
            $visita->diferencia = $visita->GF - $visita->GC;

            $casa->save();
            $visita->save();

            //Si empatan
        }else if($gc == $gv){
            $casa->puntos += 1;
            $visita->puntos += 1;

            $casa->Partidos += 1;
            $visita->Partidos += 1;

            $casa->GF += $gc;
            $casa->GC += $gv;

            $visita->GF += $gc;
            $visita->GC += $gv;

            $casa->PEmpatados += 1;
            $visita->PEmpatados += 1;

            $casa->save();
            $visita->save();

            //si gana visita
        }else if($gc < $gv){
            $visita->puntos += 3;
            $visita->Partidos += 1;
            $visita->PGanaddos +=1;
            $visita->GF += $gv;
            $visita->GC += $gc;
            $visita->diferencia = $visita->GF - $visita->GC;

            $casa->Partidos += 1;
            $casa->PPerdidos +=1;
            $casa->GF += $gc;
            $casa->GC += $gv;
            $casa->diferencia = $casa->GF - $casa->GC;

            $casa->save();
            $visita->save();
        }


    }

}
