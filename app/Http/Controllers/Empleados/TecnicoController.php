<?php

namespace App\Http\Controllers\Empleados;

use App\Http\Requests\TecnicoFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Persona;
use DB;
use Illuminate\Support\Facades\Session;

class TecnicoController extends Controller
{
    public function index() {
        return response()->json(['respuesta'=>'ok','message' => 'Registro Fallido','tecnicos' => Persona::where('TT',1)->get()]);
        //return Persona::where('TC',1)->get();
    }

    public function index2() {
        return view('empleados/tecnico/index',['tecnicos' => Persona::getTecnicos()]);
    }

    public function crearTecnico() {
        return view('empleados/tecnico/created');
    }

    public function storeTecnico(TecnicoFormRequest $request) {
        //dd($request);
        try {
            DB::beginTransaction();
            if ($request->ajax()) {
                Persona::storeTecnico($request);
                Session::put('STORE_TECNICO', '1');
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        if ($request->ajax()){
            return \response()->json(['respuesta' => 'ok','redirect_url'=>route('tecnicos')]);
        } else {
            return \response()->json(['respuesta' => 'Error al registrar al tecnico.']);
        }
    }

    public function editar($ci) {
        $tecnico = Persona::find($ci);
        return view('empleados/tecnico/edit',compact('tecnico'));
    }

    public function update(Request $request,$ci) {
        Persona::actualizarTecnico($request,$ci);
        return redirect()->route('tecnicos');
    }
}
