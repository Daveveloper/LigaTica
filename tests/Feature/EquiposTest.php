<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EquiposTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */

    /** @test */
    public function equipos(){
        $response = $this->get('/equipos');

        $response->assertStatus(200)
        ->assertSee('Alajuela');
    }

    /** @test */
    public function name_required(){

        //$this->withExceptionHandling();

        $this->from('equipos/nuevo')
            ->post('/equipos/', [
                'Nombre' => '',
                'Estadio' => 'La Uruca',
                'fundacion' => new \DateTime('2018-08-01'),
                'campeonatos' => 0
            ])
            ->assertRedirect('equipos/equipo/nuevo')
            ->assertSessionHasErrors(['Nombre'=>'El campo NOMBRE es obligatorio']);

//        $this->assertDatabaseMissing('Equipos', [
//            'Nombre'=>'Puntarenas',
//        ]);
    }
}
