<?php

namespace App\Http\Controllers;


class DomicilioClienteController extends Controller
{
    public function destroy($idCliente) {
        //dd($idCliente);
        return redirect()->route('domicilios',['id',$idCliente]);
    }
}
