<?php

namespace App\Http\Controllers\Instalacion;

use App\DomicilioCliente;
use App\Persona;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DomicilioClienteController extends Controller
{
    public function index($idCliente) {
        //dd(DomicilioCliente::where('ci_cliente',$idCliente)->get());
        return view('instalacion/domicilios/index',['domicilios' => DomicilioCliente::where('ci_cliente',$idCliente)->get(), 'cliente' => Persona::find($idCliente)]);
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
        //dd($data);
        return view('instalacion/domicilios/create',compact('data'));
    }

    public function store(Request $request,$id) {
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
}
