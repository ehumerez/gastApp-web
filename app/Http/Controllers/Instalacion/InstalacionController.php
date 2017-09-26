<?php

namespace App\Http\Controllers\Instalacion;

use App\CategoriaInstalacion;
use App\DomicilioCliente;
use App\Instalacion;
use App\Medidor;
use App\Persona;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class InstalacionController extends Controller
{
    public function index() {
        return view('instalacion/instalacion/index',['instalaciones' => Instalacion::all()]);
    }

    public function crear() {
        $data  = new \stdClass;
        $data->clientes = DB::table('domicilio_cliente as dc')
            ->join('persona as c','c.ci','=','dc.ci_cliente')
            ->select('c.ci','c.nombres','c.apellido_paterno','c.apellido_materno')
            ->where('c.TC',1)
            ->orderBy('c.nombres','asc')
            ->distinct()
            ->get();
        $medidores = Medidor::where('id_instalacion',null)->orderBy('id')->pluck('id','id');
        $data->medidores =  ['' => 'Seleccione un opcion ..'] + $medidores->toArray();
        $data->domicilios = DomicilioCliente::where('ci_cliente','!=',null)->distinct()->get();
        $categorias = CategoriaInstalacion::all()->pluck('categoria_instalacion_descripcion','id');
        $data->categorias = ['' => 'Seleccione un opcion ..'] + $categorias->toArray();
        return view('instalacion/instalacion/create',compact('data'));
    }

    public function aviso($idMedidor,$consumo) {
        $avisoCobranza = Instalacion::getAvisoCobranza($idMedidor);
        return response()->json(['data' => Instalacion::all(), 'avisos' => $avisoCobranza]);
    }

    public function store(Request $request) {
        $idInstalacion = Instalacion::crear($request);
        Medidor::asignarInstalacions($request['id_medidor'],$idInstalacion);
        return redirect()->route('instalaciones');
    }

    public function show($id) {
        $instalacion = Instalacion::getInstalacionParaMostrarView($id);
        return view('instalacion/instalacion/show',compact('instalacion'));
    }

    public function edit($id) {
        $data  = new \stdClass;
        $data = Instalacion::getInstalacionParaMostrarView($id);
        $data->clientes = DB::table('domicilio_cliente as dc')
            ->join('persona as c','c.ci','=','dc.ci_cliente')
            ->select('c.ci','c.nombres','c.apellido_paterno','c.apellido_materno')
            ->where('c.TC',1)
            ->orderBy('c.nombres','asc')
            ->distinct()
            ->get();
        $medidores = Medidor::where('id_instalacion',null)->orderBy('id')->pluck('id','id');
        $data->medidores =  ['' => 'Seleccione un opcion ..'] + $medidores->toArray();
        $data->domicilios = DomicilioCliente::where('ci_cliente','!=',null)->distinct()->get();
        $categorias = CategoriaInstalacion::all()->pluck('categoria_instalacion_descripcion','id');
        $data->categorias = ['' => 'Seleccione un opcion ..'] + $categorias->toArray();
        return view('instalacion/instalacion/edit',compact('data'));
    }

}
