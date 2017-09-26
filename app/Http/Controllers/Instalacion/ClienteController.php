<?php

namespace App\Http\Controllers\Instalacion;

use App\Http\Requests\ClienteFormRequest;
use App\Http\Controllers\Controller;
use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;

class ClienteController extends Controller
{
    public function index() {
        return response()->json(['respuesta'=>'ok','message' => 'Registro Fallido','clientes' => Persona::where('TL',1)->orwhere('TC',1)->get()]);
        //return Persona::where('TC',1)->get();
    }

    public function index2() {
        return view('instalacion/cliente/index',['clientes' => Persona::getClientes()]);
    }

    public function crearCliente() {
        return view('instalacion/cliente/created');
    }

    public function storeCliente(ClienteFormRequest $request) {

        try {
            DB::beginTransaction();
            if ($request->ajax()) {
                Persona::storeCliente($request);
                //DomicilioCliente::storeDomicilioCliente($request);
                Session::put('STORE_CLIENTE', '1');
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }
        if ($request->ajax()){
            return \response()->json(['respuesta' => 'ok','redirect_url'=>route('clientes')]);
        } else {
            return \response()->json(['respuesta' => 'Error al registrar al cliente.']);
        }
    }

    public function editar($ci) {
        $cliente = Persona::find($ci);
        return view('instalacion/cliente/edit',compact('cliente'));
    }

    public function update(Request $request,$ci) {
        Persona::actualizarCliente($request,$ci);
        return redirect()->route('clientes');
    }
}
