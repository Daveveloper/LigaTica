<?php

namespace App\Http\Controllers;

use App\model\Posiciones;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\model\Partidos;
use App\model\Equipos;
use App\model\Jornadas;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

            $user = Auth::user();
            $teams = Equipos::all();


            /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
                        /*ENCONTRAR UNA FORMA DE LEER LA FECHA DE LA PROXIMA JORNADA*/
            //Por ejemplo ir aumentando en uno la jornada si la fecha de la jornada ya paso...

            $fecha = new Carbon('wednesday');
            $fecha = $fecha->format('Y-m-d');
            $jornada = DB::table('jornadas')
                ->select('num_jornada')
                ->where('fecha', '=', $fecha)
                ->get();

            if($jornada->isEmpty()) {
                $lista_partidos = Partidos::all()->where('jornada', 1);
            }else{
                $lista_partidos = Partidos::all()->where('jornada', $jornada[0]->num_jornada);
            }
                /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/


            /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
            //Array para obtener los nombres de los equipos sin consultar la base de datos.
            $equipos = array(
                1 => 'Alajuela',
                2 => 'Saprissa',
                3 => 'Heredia',
                4 => 'Cartago',
                5 => 'Santos',
                6 => 'Perez Zeledon',
                7 => 'Carmelita',
                8 => 'Guadalupe',
                9 => 'San Carlos',
                10 => 'Limon',
                11 => 'UCR',
                12 => 'Grecia'
            );
            /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/



            /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
            //Ordena la tabla de posiciones segun dos criterios: Puntos y Diferencia de goles.
            $posiciones = DB::table('Posiciones')
                ->orderBy('puntos', 'desc')
                ->orderBy('diferencia', 'desc')->get();
            /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/



            return view('dashboard')
                ->with('fecha', $fecha)
                ->with('partidos', $lista_partidos)
                ->with('equipos', $equipos)
                ->with('teams', $teams)
                ->with('posiciones', $posiciones)
                ->with('user', $user);

    }

    public function recarga(){

        $data = request('jornada');
        $lista_partidos = Partidos::all()->where('jornada','=', $data);
        $teams = Equipos::all();

        $equipos = array(
            1=>'Alajuela',
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
        );

        return view('dashboard')
            ->with('partidos', $lista_partidos)
            ->with('equipos', $equipos)
            ->with('teams',$teams)
            ->with('id', $data);
    }
}
