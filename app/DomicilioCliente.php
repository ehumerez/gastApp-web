<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DomicilioCliente extends Model
{
    protected $table = 'domicilio_cliente';

    protected $fillable = ['direccion','lat','lng','uv','manzana','nro','ci_cliente'];

    public function scopestoreDomicilioCliente($query,$request) {
        $dc = new DomicilioCliente;
        $dc->ci_cliente = $request['ci'];
        $dc->direccion = $request['direccion'] == null?'':$request['direccion'];
        //$dc->lat = $request['lat'] == null?'':$request['lat'];
        //$dc->lng = $request['lng'] == null?'':$request['lng'];
        $dc->uv = $request['uv'] == null?'':$request['uv'];
        $dc->manzana = $request['manzana'] == null?'':$request['manzana'];
        $dc->nro = $request['nro'] == null?'':$request['nro'];
        $dc->save();
        return $this->all()->last()->id;
    }

    public function cliente() {
        return $this->hasOne('App\Persona','ci','ci_cliente');
    }

}
