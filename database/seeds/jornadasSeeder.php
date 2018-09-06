<?php

use Illuminate\Database\Seeder;
use App\model\Jornadas;

class jornadasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jornadas::create([
            'num_jornada'=>'1',
            'fecha'=>new DateTime('2018-07-22')
        ]);

        Jornadas::create([
            'num_jornada'=>'2',
            'fecha'=>new DateTime('2018-07-29')
        ]);
    }
}
