<?php

use Illuminate\Database\Seeder;
use App\model\Partidos;

class partidosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    /*
     *      1=>'Alajuela',
            2=>'Saprissa',
            3=>'Heredia',
            4=>'Cartago',
            5=>'Santos',
            6=>'Perez Zeledon',
            7=>'Carmelita',
            8=>'Guadalupe',
            9=>'San Carlos',
            10=>'Limon',
            11=>'UCR',
            12=>'Grecia'
     */
    public function run()
    {

        //JORNADA 1
        Partidos::create(['equipocasa'=>12,
            'equipovisita'=>1,
            'jornada'=>1
            ]);
        Partidos::create(['equipocasa'=>2,
            'equipovisita'=>5,
            'jornada'=>1
            ]);
        Partidos::create(['equipocasa'=>6,
            'equipovisita'=>8,
            'jornada'=>1
            ]);
        Partidos::create(['equipocasa'=>4,
            'equipovisita'=>7,
            'jornada'=>1
            ]);
        Partidos::create(['equipocasa'=>10,
            'equipovisita'=>9,
            'jornada'=>1
            ]);
        Partidos::create(['equipocasa'=>3,
            'equipovisita'=>11,
            'jornada'=>1
            ]);

        //JORNADA 2
        Partidos::create(['equipocasa'=>4,
            'equipovisita'=>10,
            'jornada'=>2]);
        Partidos::create(['equipocasa'=>8,
            'equipovisita'=>3,
            'jornada'=>2]);
        Partidos::create(['equipocasa'=>11,
            'equipovisita'=>12,
            'jornada'=>2]);
        Partidos::create(['equipocasa'=>9,
            'equipovisita'=>2,
            'jornada'=>2]);
        Partidos::create(['equipocasa'=>1,
            'equipovisita'=>6,
            'jornada'=>2]);
        Partidos::create(['equipocasa'=>5,
            'equipovisita'=>7,
            'jornada'=>2]);

    }
}
