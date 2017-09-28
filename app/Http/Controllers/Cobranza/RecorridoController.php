<?php

namespace App\Http\Controllers\Cobranza;

use App\Instalacion;
use App\Persona;
use App\Recorrido;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class RecorridoController extends Controller
{
    public function index() {
        return view('cobranza/recorridos/index',['recorridos' => Recorrido::all()]);
    }

    public function crear() {
        $instalaciones = Instalacion::all();
        //dd($instalaciones->domicilioCliente);
        return view('cobranza/recorridos/create',compact('instalaciones'));
    }

    public function store(Request $request) {
        //dd($request);
        try {
            DB::beginTransaction();
            $idRecorrido = Recorrido::crear($request);
            Instalacion::crearDesdeRecorrido($idRecorrido,$request);
            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

        }
        return redirect()->route('recorridos');
    }

    public function asignarLecturador($id) {
        $recorrido = Recorrido::find($id);
        //dd($recorrido);
        $lecturadores = Persona::getLecturadoresSinAsignar();
        return view('cobranza/recorridos/asignar',compact('recorrido','lecturadores'));
    }

    public function crearAsignacionLecturador(Request $request,$idRecorrido) {
        $recorrido = Recorrido::find($idRecorrido);
        $recorrido->ci_lecturador = $request['ci_lecturador'];
        $recorrido->update();
        return redirect()->route('recorridos');
    }

    public function showRecorrido($ciLecturador,$idRecorrido) {
        //dd(['ciLecturador'=>$ciLecturador, 'idRecorrido'=> $idRecorrido]);
        $lecturador = Persona::find($ciLecturador);
        $recorrido = Recorrido::find($idRecorrido);
        //dd($recorrido->instalacion);
        return view('cobranza/recorridos/mostrar',['lecturador' => $lecturador, 'recorrido' => $recorrido]);
    }
}
