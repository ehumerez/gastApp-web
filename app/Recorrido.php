<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recorrido extends Model
{
    protected $table = 'recorrido';

    protected $fillable = ['recorrido_descripcion','tiempo_estimado','fecha'];

    public function scopecrear($query,$request) {
        $request['ci_lecturador'] = null;
        $this->create($request->all());
        return $this->all()->last()->id;
    }

    public function lecturador() {
        return $this->belongsTo('App\Persona','ci_lecturador');
    }

    public function instalacion() {
        return $this->hasMany('App\Instalacion','id_recorrido','id');
    }

}
