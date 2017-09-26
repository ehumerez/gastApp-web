<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Persona extends Model
{
    protected $table = 'persona';
    protected $primaryKey = 'ci';
    public static $TIPO_CLIENTE = 1;
    public static $TIPO_LECTURADOR = 1;
    public static $TIPO_TECNICO = 1;

    // Métodos del cliente
    public function scopestoreCliente($query,$request) {
        $cliente = new Persona;
        $cliente->ci = $request['ci'] == null?'':$request['ci'];
        $cliente->nombres =$request['nombres'] == null?'':$request['nombres'];;
        $cliente->apellido_paterno =$request['apellido_paterno'] == null?'':$request['apellido_paterno'];;
        $cliente->apellido_materno =$request['apellido_materno'] == null?'':$request['apellido_materno'];;
        $cliente->email =$request['email'] == null?'':$request['email'];;
        $cliente->telefono_fijo =$request['telefono_fijo'] == null?'':$request['telefono_fijo'];;
        $cliente->telefono_celular =$request['telefono_celular'] == null?'':$request['telefono_celular'];;
        $cliente->TC =$this::$TIPO_CLIENTE;
        $cliente->cliente_codigo =$request['cliente_codigo'] == null?'':$request['cliente_codigo'];;
        $cliente->TL =0;
        $cliente->TT =0;
        $cliente->id_usuario = null;
        $cliente->activo = 1;
        $cliente->save();
        //dd($request);
        return $this->all()->last()->ci;
    }

    public function scopeactualizarCliente($query,$request,$ci) {
        $cliente = Persona::find($ci);
        $cliente->ci = $request['ci'] == null?'':$request['ci'];
        $cliente->nombres =$request['nombres'] == null?'':$request['nombres'];;
        $cliente->apellido_paterno =$request['apellido_paterno'] == null?'':$request['apellido_paterno'];;
        $cliente->apellido_materno =$request['apellido_materno'] == null?'':$request['apellido_materno'];;
        $cliente->email =$request['email'] == null?'':$request['email'];;
        $cliente->telefono_fijo =$request['telefono_fijo'] == null?'':$request['telefono_fijo'];;
        $cliente->telefono_celular =$request['telefono_celular'] == null?'':$request['telefono_celular'];;
        $cliente->TC =$this::$TIPO_CLIENTE;
        $cliente->cliente_codigo =$request['cliente_codigo'] == null?'':$request['cliente_codigo'];;
        $cliente->TL =0;
        $cliente->TT =0;
        $cliente->id_usuario = null;
        $cliente->update();
        return;
    }

    public function scopegetClientes() {
        return $this->where('TC',1)->where('TL',0)->get();
    }

    public function domicilioCliente() {
        return $this->hasMany('App\DomicilioCliente','ci_cliente','ci');
    }

    public function recorrido() {
        return $this->hasMany('App\Recorrido','ci_lecturador','ci');
    }

    // Métodos del lecturador
    public function scopestoreLecturador($query,$request) {
        $cliente = new Persona;
        $cliente->ci = $request['ci'] == null?'':$request['ci'];
        $cliente->nombres =$request['nombres'] == null?'':$request['nombres'];;
        $cliente->apellido_paterno =$request['apellido_paterno'] == null?'':$request['apellido_paterno'];;
        $cliente->apellido_materno =$request['apellido_materno'] == null?'':$request['apellido_materno'];;
        $cliente->email =$request['email'] == null?'':$request['email'];;
        $cliente->telefono_fijo =$request['telefono_fijo'] == null?'':$request['telefono_fijo'];;
        $cliente->telefono_celular =$request['telefono_celular'] == null?'':$request['telefono_celular'];;
        $cliente->TC =0;
        $cliente->TL =$this::$TIPO_LECTURADOR;
        $cliente->TT =0;
        $cliente->id_usuario = null;
        $cliente->activo = 1;
        $cliente->save();
        //dd($request);
        return $this->all()->last()->ci;
    }

    public function scopeactualizarLecturador($query,$request,$ci) {
        $cliente = Persona::find($ci);
        $cliente->ci = $request['ci'] == null?'':$request['ci'];
        $cliente->nombres =$request['nombres'] == null?'':$request['nombres'];;
        $cliente->apellido_paterno =$request['apellido_paterno'] == null?'':$request['apellido_paterno'];;
        $cliente->apellido_materno =$request['apellido_materno'] == null?'':$request['apellido_materno'];;
        $cliente->email =$request['email'] == null?'':$request['email'];;
        $cliente->telefono_fijo =$request['telefono_fijo'] == null?'':$request['telefono_fijo'];;
        $cliente->telefono_celular =$request['telefono_celular'] == null?'':$request['telefono_celular'];;
        $cliente->TC =0;
        $cliente->TL =$this::$TIPO_LECTURADOR;
        $cliente->TT =0;
        $cliente->id_usuario = null;
        $cliente->update();
        return;
    }

    public function scopegetLecturadores() {
        return $this->where('TL',1)->get();
    }

    // Métodos del técnico
    public function scopestoreTecnico($query,$request) {
        $cliente = new Persona;
        $cliente->ci = $request['ci'] == null?'':$request['ci'];
        $cliente->nombres =$request['nombres'] == null?'':$request['nombres'];;
        $cliente->apellido_paterno =$request['apellido_paterno'] == null?'':$request['apellido_paterno'];;
        $cliente->apellido_materno =$request['apellido_materno'] == null?'':$request['apellido_materno'];;
        $cliente->email =$request['email'] == null?'':$request['email'];;
        $cliente->telefono_fijo =$request['telefono_fijo'] == null?'':$request['telefono_fijo'];;
        $cliente->telefono_celular =$request['telefono_celular'] == null?'':$request['telefono_celular'];;
        $cliente->TC =0;
        $cliente->TL =0;
        $cliente->TT =$this::$TIPO_TECNICO;
        $cliente->id_usuario = null;
        $cliente->activo = 1;
        $cliente->save();
        //dd($request);
        return $this->all()->last()->ci;
    }

    public function scopeactualizarTecnico($query,$request,$ci) {
        $cliente = Persona::find($ci);
        $cliente->ci = $request['ci'] == null?'':$request['ci'];
        $cliente->nombres =$request['nombres'] == null?'':$request['nombres'];;
        $cliente->apellido_paterno =$request['apellido_paterno'] == null?'':$request['apellido_paterno'];;
        $cliente->apellido_materno =$request['apellido_materno'] == null?'':$request['apellido_materno'];;
        $cliente->email =$request['email'] == null?'':$request['email'];;
        $cliente->telefono_fijo =$request['telefono_fijo'] == null?'':$request['telefono_fijo'];;
        $cliente->telefono_celular =$request['telefono_celular'] == null?'':$request['telefono_celular'];;
        $cliente->TC =0;
        $cliente->TL =0;
        $cliente->TT =$this::$TIPO_TECNICO;
        $cliente->id_usuario = null;
        $cliente->update();
        return;
    }

    public function scopegetTecnicos() {
        return $this->where('TT',1)->get();
    }

    public function scopegetLecturadoresSinAsignar($query) {
        //$instalaciones = DB::table('recorrido')->select('id')->where('ci_lecturador',"=",null)->get();
        return $query->has('recorrido','<',1)->where('TL',1)->where('activo',1)->get();
    }

}
