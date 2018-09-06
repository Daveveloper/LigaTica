<?php

use Illuminate\Database\Seeder;
use App\model\Equipos;

class equiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Equipos::create([
            'nombre'=>'Alajuela',
            'estadio'=>'Alejandro Morera Soto',
            'fundacion'=>new DateTime('1919/06/19'),
            'campeonatos'=>29
        ]);

        Equipos::create([
            'nombre'=>'Saprissa',
            'estadio'=>'Ricardo Saprissa',
            'fundacion'=>new DateTime('1919/06/19'),
            'campeonatos'=>34
        ]);

        Equipos::create([
            'nombre'=>'Heredia',
            'estadio'=>'Eladio Rosabal Cordero',
            'fundacion'=>new DateTime('1919/06/19'),
            'campeonatos'=>25
        ]);

        Equipos::create([
            'nombre'=>'Cartago',
            'estadio'=>'Fello Meza',
            'fundacion'=>new DateTime('1919/06/19'),
            'campeonatos'=>2
        ]);

        Equipos::create([
            'nombre'=>'Santos',
            'estadio'=>'Ebal Rodriguez',
            'fundacion'=>new DateTime('1919/06/19'),
            'campeonatos'=>0
        ]);

        Equipos::create([
            'nombre'=>'Perez Zeledon',
            'estadio'=>'Municipal de Perez Zeledon',
            'fundacion'=>new DateTime('1919/06/19'),
            'campeonatos'=>1
        ]);

        Equipos::create([
            'nombre'=>'Carmelita',
            'estadio'=>'Carmen',
            'fundacion'=>new DateTime('1919/06/19'),
            'campeonatos'=>0
        ]);

        Equipos::create([
            'nombre'=>'Guadalupe',
            'estadio'=>'Guadalupe',
            'fundacion'=>new DateTime('1919/06/19'),
            'campeonatos'=>0
        ]);

        Equipos::create([
            'nombre'=>'San Carlos',
            'estadio'=>'Carlos Ugalde',
            'fundacion'=>new DateTime('1919/06/19'),
            'campeonatos'=>0
        ]);

        Equipos::create([
            'nombre'=>'Limon',
            'estadio'=>'Juan Goban',
            'fundacion'=>new DateTime('1919/06/19'),
            'campeonatos'=>0
        ]);

        Equipos::create([
            'nombre'=>'UCR',
            'estadio'=>'UCR',
            'fundacion'=>new DateTime('1919/06/19'),
            'campeonatos'=>0
        ]);

        Equipos::create([
            'nombre'=>'Grecia',
            'estadio'=>'Allen Riñoni',
            'fundacion'=>new DateTime('1919/06/19'),
            'campeonatos'=>0
        ]);
    }
}
