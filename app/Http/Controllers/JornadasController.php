<?php

namespace App\Http\Controllers;

use App\model\Posiciones;
use function Couchbase\defaultDecoder;
use Illuminate\Http\Request;
use App\model\Partidos;
use App\model\Equipos;
use App\model\Jornadas;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\DocBlock;
use function Sodium\add;


class JornadasController extends Controller
{
    public function index(Request $request){
        //$lista = Equipos::all();
        $request->user()->authorizeRoles('admin');
        $jor = request('num');

        if($jor == null){
            $jor = 1;
        }

        $lista = DB::table('Partidos')
            ->join('Equipos as el','partidos.equipocasa','=',  'el.id')
            ->join('Equipos as ev','partidos.equipovisita','=',  'ev.id')
            ->select('el.nombre as local','partidos.golCasa','ev.nombre as visita','partidos.golVisita','partidos.jornada','partidos.id')
            ->where('jornada', $jor)
            ->orderBy('partidos.jornada')
            ->get();

        $jornadas = Jornadas::all('num_jornada');
        //dd($lista);

        return view('jornadas.index')
            ->with('lista',$lista)
            ->with('jor', $jor)
            ->with('jornadas', $jornadas);
    }

    public function create(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        $listaEquipos = Equipos::all();
        $jornadas = Jornadas::all()->pluck('num_jornada');

        //dd($jornadas);
        return view('jornadas.create')
            ->with('listaEquipos',$listaEquipos)
            ->with('jornadas',$jornadas);
    }

    public function guardar(Request $request){
        $request->user()->authorizeRoles('admin');
        /*$d = request()->all();
        dd($d);*/
        //Obtenemos los datos del formulario
        $data = request()->validate([
            'jornada'=>'required',
            'fecha'=>'required',
            'ecasa'=>'required',
            'evisita'=>'required',
        ],[
            'jornada.required'=>'Numero de jornada ya existe.',
            'fecha.required'=>'Debe ingresar una fecha.',
            'ecasa.required'=>'EC: No puede repetir el equipo',
            'evisita.required'=>'EV: No puede repetir el equipo',
        ]);


        $fecha = $data['fecha'];

        //Verificamos si la jornada digitada ya existe en la base de datos.
        $jor = $data['jornada'];
        $j = new Jornadas();
        $existe = $j->existe($jor);
        if($existe){
            return redirect()->route('jornadas.crear')->withErrors([
                'jornada'=>'La jornada ya existe',
            ]);
        }

        $casa = $data['ecasa'];
        $visita = $data['evisita'];

        //Se verifica que ningun equipo se repita.
        for($i = 0; $i < 6; $i++){
            /* Si el valor de casa en la posicion i esta en el
            arreglo visita entonces se debe devolver un error */
            if(in_array($casa[$i],$visita) || empty($casa)) {
                return redirect()->route('jornadas.crear')->withErrors([
                    'evisita' => 'Equipo visita repetido'
                ]);
            }

//            if(in_array($casa[$i],$casa)){
//                return redirect()->route('jornadas.crear')->withErrors([
//                    'ecasa'=>'Equipo casa repetido'
//                ]);
//            }
        }

        //Creo la jornada
        Jornadas::create([
            'num_jornada'=>$jor,
            'fecha'=> $fecha
        ]);

        //Creo los partidos.
        for($i = 0; $i < 6; $i++){

            Partidos::create(['equipocasa' => $casa[$i],
                'equipovisita' => $visita[$i],
                'jornada' => $jor]);
        }


        return redirect()->route('jornadas');
    }

    public function match_details(Request $request, $id){
        $request->user()->authorizeRoles(['user','admin']);

        $match = DB::table('Partidos')
            ->join('Equipos as el','partidos.equipocasa','=',  'el.id')
            ->join('Equipos as ev','partidos.equipovisita','=',  'ev.id')
            ->select('el.nombre as local','partidos.golCasa','ev.nombre as visita','partidos.golVisita','partidos.jornada')
            ->where('partidos.id', $id)
            ->get();

        return view('jornadas.partido')->with('partido', $match);
    }

    public function editarPartido(Request $request, $id){
        $request->user()->authorizeRoles('admin');
        $ec = DB::table('Partidos')
            ->join('Equipos as el','partidos.equipocasa','=',  'el.id')
            ->join('Equipos as ev','partidos.equipovisita','=',  'ev.id')
            ->select('el.nombre as local','partidos.golCasa','ev.nombre as visita','partidos.golVisita','partidos.id')
            ->where('partidos.id', $id)
            ->get();

        $equipos = Equipos::all('id','Nombre');

        return view('Jornadas.editarPartido')
            ->with('partido', $ec)
            ->with('equipos',$equipos);

    }

    public function guardarEdicion(Request $request){
        $request->user()->authorizeRoles('admin');

        $partido = Partidos::find($request->id);

        $partido->equipocasa = $request->casa;
        $partido->equipovisita = $request->visita;
        $partido->golCasa = $request->gl;
        $partido->golVisita = $request->gv;

        $partido->save();
        return redirect()->route('jornadas');
    }

    public function jornadas(Request $request){
        $request->user()->authorizeRoles(['user','admin']);
        $lista = DB::table('Partidos')
            ->join('Equipos as el','partidos.equipocasa','=',  'el.id')
            ->join('Equipos as ev','partidos.equipovisita','=',  'ev.id')
            ->select('el.nombre as local','partidos.golCasa','ev.nombre as visita','partidos.golVisita','partidos.jornada','partidos.id')
            ->orderBy('jornada')
            ->get();

        $jornadas = Jornadas::all('num_jornada', 'fecha');

        //dd($jornadas);
        return view('jornadas.jornadas')
            ->with('lista',$lista)
            ->with('jornadas',$jornadas);
    }

    public function resultados(Request $request){
        $request->user()->authorizeRoles('admin');

        $jornada = request('jornada');

        $lista = DB::table('Partidos')
            ->join('Equipos as el','partidos.equipocasa','=',  'el.id')
            ->join('Equipos as ev','partidos.equipovisita','=',  'ev.id')
            ->select('el.id as eid','el.nombre as local','partidos.golCasa','ev.id as vid','ev.nombre as visita',
                                        'partidos.golVisita','partidos.jornada','partidos.id')
            ->where('jornada',$jornada)
            ->get();

        return view('jornadas.feed')->with('lista',$lista);
    }

    public function feed(Request $request){
        $request->user()->authorizeRoles('admin');

        $data = request()->all();

        $match = $data['partidos'];
        $golcasa = $data['golcasa'];
        $golvisita = $data['golvisita'];
        $idcasa = $data['idcasa'];
        $idvisita = $data['idvisita'];

        foreach ($match as $key=>$value){
            $partido = Partidos::findOrFail($value);
            $partido->golcasa = $golcasa[$key];
            $partido->golvisita = $golvisita[$key];

            $casa = $partido->equipocasa;
            $visita = $partido->equipovisita;

            $partido->partido($casa, $golcasa[$key], $visita, $golvisita[$key]);

            $partido->save();


        }

        return redirect()->route('jornadas');

    }

}
