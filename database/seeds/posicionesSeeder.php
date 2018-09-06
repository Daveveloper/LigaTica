<?php

use Illuminate\Database\Seeder;
use App\model\Posiciones;

class posicionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Posiciones::create([
            'equipo_id'=>1,
        ]);

        Posiciones::create([
            'equipo_id'=>2,
        ]);

        Posiciones::create([
            'equipo_id'=>3,
        ]);

        Posiciones::create([
            'equipo_id'=>4,
        ]);
        Posiciones::create([
            'equipo_id'=>5,
        ]);
        Posiciones::create([
            'equipo_id'=>6,
        ]);
        Posiciones::create([
            'equipo_id'=>7,
        ]);
        Posiciones::create([
            'equipo_id'=>8,
        ]);
        Posiciones::create([
            'equipo_id'=>9,
        ]);
        Posiciones::create([
            'equipo_id'=>10,
        ]);
        Posiciones::create([
            'equipo_id'=>11,
        ]);
        Posiciones::create([
            'equipo_id'=>12,
        ]);
    }
}
