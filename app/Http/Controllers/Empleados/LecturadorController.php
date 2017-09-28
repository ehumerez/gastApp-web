<?php

namespace App\Http\Controllers\Empleados;

use App\Http\Requests\LecturadorFormRequest;
use App\Recorrido;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Persona;
use DB;
use Illuminate\Support\Facades\Session;

class LecturadorController extends Controller
{
    public function index() {
        return response()->json(['respuesta'=>'ok','message' => 'Registro Fallido','lecturador' => Persona::where('TL',1)->get()]);
        //return Persona::where('TC',1)->get();
    }

    public function index2() {
        return view('empleados/lecturador/index',['lecturadores' => Persona::getLecturadores()]);
    }

    public function crearLecturador() {
        return view('empleados/lecturador/created');
    }

    public function storeLecturador(LecturadorFormRequest $request) {
        //dd($request);
        try {
            DB::beginTransaction();
            if ($request->ajax()) {
                Persona::storeLecturador($request);
                Session::put('STORE_LECTURADOR', '1');
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        if ($request->ajax()){
            return \response()->json(['respuesta' => 'ok','redirect_url'=>route('lecturadores')]);
        } else {
            return \response()->json(['respuesta' => 'Error al registrar al lecturador.']);
        }
    }

    public function editar($ci) {
        $lecturador = Persona::find($ci);
        return view('empleados/lecturador/edit',compact('lecturador'));
    }

    public function update(Request $request,$ci) {
        Persona::actualizarLecturador($request,$ci);
        return redirect()->route('lecturadores');
    }

    public function eliminar($ci) {
        $lecturador = Persona::find($ci);
        $lecturador->activo = 0;
        $lecturador->update();
        return redirect()->route('lecturadores');
    }

    public function recorridos($ci) {
        return view('empleados/lecturador/index_recorridos',['lecturador' => Persona::find($ci)]);
    }
}
