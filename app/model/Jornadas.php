<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class jornadas extends Model
{
    protected $table = 'jornadas';
    protected $guarded = ['id'];


    public function existe($jor){

        $jornadas = Jornadas::all()->pluck('num_jornada');
        $e = false;
        foreach ($jornadas as $j){
            if($j == $jor){
                $e = true;
            }
        }

        return $e;
    }
}
