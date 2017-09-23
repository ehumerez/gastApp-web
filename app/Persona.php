<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'persona';
    protected $primaryKey = 'ci';
    public static $TIPO_CLIENTE = 1;
    public static $TIPO_LECTURADOR = 1;

    public function scopestoreCliente($query,$request) {
        $cliente = new Persona;
        $cliente->ci = $request['ci'] == null?'':$request['ci'];
        $cliente->nombres =$request['nombres'] == null?'':$request['nombres'];;
        $cliente->apellido_paterno =$request['apellido_paterno'] == null?'':$request['apellido_paterno'];;
        $cliente->apellido_materno =$request['apellido_materno'] == null?'':$request['apellido_materno'];;
        $cliente->email =$request['email'] == null?'':$request['ci'];;
        $cliente->telefono_fijo =$request['telefono_fijo'] == null?'':$request['telefono_fijo'];;
        $cliente->telefono_celular =$request['telefono_celular'] == null?'':$request['telefono_celular'];;
        $cliente->TC =$this::$TIPO_CLIENTE;
        $cliente->cliente_codigo =$request['cliente_codigo'] == null?'':$request['cliente_codigo'];;
        $cliente->TL =0;
        $cliente->id_usuario = null;
        //if ($cliente->save()) return true; else false;
        $cliente->save();
        return $this->all()->last()->ci;
    }

    public function scopegetClientes() {
        return $this->where('TC',1)->where('TL',0)->get();
    }

    public function domicilioCliente() {
        return $this->hasMany('App\DomicilioCliente','id','ci');
    }

}
