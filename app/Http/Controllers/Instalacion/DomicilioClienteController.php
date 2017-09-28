<?php

namespace App\Http\Controllers\Instalacion;

use App\DomicilioCliente;
use App\Http\Requests\DomicilioFormRequest;
use App\Instalacion;
use App\Municipio;
use App\Persona;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DomicilioClienteController extends Controller
{
    public function index($idCliente) {
        //dd(DomicilioCliente::where('ci_cliente',$idCliente)->get());
        //dd(DomicilioCliente::all());
        //$domicilios = count(DomicilioCliente::where('ci_cliente',$idCliente)->get()) == 0?null:DomicilioCliente::where('ci_cliente',$idCliente)->get();
        $domicilio = DB::table('persona as c')
            ->join('domicilio_cliente as dc','dc.ci_cliente','=','c.ci')
            ->where('c.TC',1)
            ->where('dc.ci_cliente',$idCliente)
            ->get();
        //dd($domicilios);
        $domicilios = DomicilioCliente::all()->where('ci_cliente',$idCliente);
        return view('instalacion/domicilios/index',['domicilios' => $domicilios, 'cliente' => Persona::find($idCliente)]);
    }

    public function crear($idCliente) {
       /* $clientes = Persona::where('TC',1)->where('TL',0)->pluck('Nombres','ci');
        $data->clientes = ['' => 'Seleccione'] + $clientes->toArray();
        /*$medidores = Medidor::orderBy('id')->pluck('consumo_m3','id');
        $data->medidores =  ['' => 'Seleccione'] + $medidores->toArray();
        $medidores = Medidor::orderBy('id')->select('id','consumo_m3')->get();
        $data->medidores = $medidores;*/
        $data  = new \stdClass;
        $data = Persona::find($idCliente);
        $municipios = Municipio::all();
        //dd($municipios);
        return view('instalacion/domicilios/create',compact('data','municipios'));
    }

    public function store(DomicilioFormRequest $request,$id) {
        $request['ci_cliente'] = $id;
        DomicilioCliente::create($request->all());
        return redirect()->route('domicilios',['id' => $id]);
    }
    public function getLatLng(Request $request) {

        /*$dom = Persona::find($idCliente);*/
        $d = DomicilioCliente::find($request['idD']);
        $d::where('ci_cliente',$request['idC'])->get();
        //dd($d);
        //$d::find($request['idD']);
        //dd($request);
        return response()->json(['respuesta' => 'ok', 'lat' => $d->lat ,'lng' => $d->lng]);
    }

    public function destroy($ci,$id) {
        $domicilio = DomicilioCliente::find($id);
        $domicilio->delete();
        return redirect()->route('domicilios',['id' => $ci]);
    }

    public function getDomicilios($ci) {
        $instalaciones = Instalacion::select('id_domicilio_cliente')->get();
        $dom = DB::table('domicilio_cliente')
            ->where('ci_cliente',$ci)
            ->whereNotIn('id', $instalaciones)
            ->get();
        return response()->json(['respuesta'=>'ok','ci' => $ci,'domicilios' => $dom]);
    }
}
