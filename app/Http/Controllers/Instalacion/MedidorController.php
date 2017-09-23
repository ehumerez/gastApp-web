<?php

namespace App\Http\Controllers\Instalacion;

use App\Medidor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Illuminate\Support\Facades\Session;

class MedidorController extends Controller
{

    public function index() {
        $medidores = Medidor::all();
        return view('instalacion/medidor/index',compact('medidores'));
    }

	public function created() {
		return view('instalacion/medidor/created');
	}

	public function store(Request $request) {
	    //dd($request);
		Medidor::crearMedidor($request);
		//return response()->json(['respuesta' => 'ok','message' => 'El medidor se registró exitósamente']);
        return redirect('medidores');
	}

	public function edit($id) {
        return view('instalacion/medidor/edit',['data'=> Medidor::find($id)]);
    }

    public function update(Request $request, $id) {
        Session::put('UPDATE_MEDIDOR', '1');
        Medidor::actualizar($request,$id);
        return redirect('medidores');
    }

}
