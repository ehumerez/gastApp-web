<?php

namespace App\Http\Controllers\Instalacion;

use App\Http\Requests\MedidorFormRequest;
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

	public function store(MedidorFormRequest $request) {
	    //dd($request);
		Medidor::crearMedidor($request);
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

    /*public function setConsumo(Request $request,$idMedidor) {

        return response()->json(['respuesta' => 'ok','message' => $request['idMedidor'],'id'=>$idMedidor]);
    }*/

    public function setConsumo(Request $request,$idMedidor) {

        $medidor = Medidor::find($idMedidor);
        $medidor->consumo_m3 = $request['consumo_m3'];
        $medidor->update();
        return response()->json(['respuesta' => 'ok','redirect_url' => route('medidor/index'),'consumo' => $idMedidor]);
    }


}
