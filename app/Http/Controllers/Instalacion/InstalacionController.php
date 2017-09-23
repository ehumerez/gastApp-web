<?php

namespace App\Http\Controllers\Instalacion;

use App\Instalacion;
use App\Medidor;
use App\Persona;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InstalacionController extends Controller
{
    public function index() {
        return view('instalacion/instalacion/index',['instalaciones' => Instalacion::all()]);
    }

    public function crear() {
        $data  = new \stdClass;
        $clientes = Persona::where('TC',1)->where('TL',0)->pluck('Nombres','ci');
        $data->clientes = ['' => 'Seleccione'] + $clientes->toArray();
        /*$medidores = Medidor::orderBy('id')->pluck('consumo_m3','id');
        $data->medidores =  ['' => 'Seleccione'] + $medidores->toArray();*/
        $medidores = Medidor::orderBy('id')->select('id','consumo_m3')->get();
        $data->medidores = $medidores;
        return view('instalacion/instalacion/create',compact('data'));
    }
}
