<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Posiciones extends Model
{
    //
    protected $table = 'posiciones';
    protected $fillable = ['equipo_id','puntos','Partidos','PGanaddos','PEmpatados','PPerdidos','GF','GC','Diferencia'];
    protected $guarded = ['id'];

    public function Equipos(){
        return $this->hasMany(Equipos::class, 'equipo_id');
    }
}
