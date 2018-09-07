<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Goleador extends Model
{
    //
    private $nombre;
    private $cantidad;
    private $equipo;

    protected $fillable = ['nombre','cantidad','equipo'];

    public function __construct($name, $cant, $team, array $attributes = [])
    {
        parent::__construct($attributes);

        $this->nombre = $name;
        $this->cantidad = $cant;
        $this->equipo = $team;

    }

    public function ActualizarGoles($golesNuevos){
        $this->cantidad += $golesNuevos;
    }

}
