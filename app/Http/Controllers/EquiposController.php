<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Equipos;

class EquiposController extends Controller
{
    public function index(Request $request){
        $request->user()->authorizeRoles('admin');
        $lista = Equipos::all();
        return view('Equipos.index')->with('lista',$lista);
    }

    public function nuevoEquipo(Request $request){
        $request->user()->authorizeRoles('admin');
        return view('Equipos.nuevo');
    }

    public function create(Request $request){
        $request->user()->authorizeRoles('admin');

        $data = request()->validate([
            'nombre' => 'required',
            'estadio' => 'required',
            'fundacion' => 'required',
            'campeonatos' => 'required',
            'reseña' => 'required',
            'estado' => 'required'
        ], [
            'nombre.required'=>'El campo NOMBRE es obligatorio.',
            'estadio.required' => 'El campo Estadio es obligatorio.',
            'fundacion.required' => 'El campo Fundacion es obligatorio.',
            'campeonatos.required' => 'El campo Campeonatos es obligatorio.',
            'reseña.required'=> 'El campo Reseña es obligatorio.',
            'estado.required' => 'Debe indicar si el equipo esta activo.',
        ]);

        //dd($data);

        Equipos::create([
            'Nombre'=>$data['nombre'],
            'Estadio'=>$data['estadio'],
            'fundacion'=>$data['fundacion'],
            'campeonatos'=>$data['campeonatos'],
            'reseña'=>$data['reseña'],
            'activo'=>$data['estado']
        ]);

        return redirect()->route('Equipos');
    }

    public function details(Request $request, Equipos $equipo){
        $request->user()->authorizeRoles(['user','admin']);

        $estadisticas = $equipo->posicion;
        $posicion = $equipo->posicionActual($equipo->id);

        return view('Equipos.details', compact('equipo',$equipo))
            ->with('estadisticas', $estadisticas)
            ->with('posicion', $posicion);
    }

    public function edit(Request $request, Equipos $equipo){
        $request->user()->authorizeRoles('admin');
        return view('Equipos.edit', compact('equipo',$equipo));
    }

    public function saveChanges(Request $request){
        $request->user()->authorizeRoles('admin');
        $id = request('id');
        $equipo = Equipos::find($id);

        $equipo->Nombre = request('nombre');
        $equipo->Estadio = request('estadio');
        $equipo->Fundacion = request('fundacion');
        $equipo->campeonatos = request('campeonatos');
        $equipo->reseña = request('reseña');
        $equipo->activo = request('options');

        $equipo->save();

        return redirect()->route('Equipos');
    }

    public function delete(Request $request,Equipos $equipo){
        $request->user()->authorizeRoles('admin');
        $equipo->delete();

        return redirect('/equipos');

    }
}
