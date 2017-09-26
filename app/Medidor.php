<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medidor extends Model
{
    protected $table = 'medidor';

    protected $fillable = [
        'consumo_m3','codigo_qr','id_instalacion'
    ];

    public function scopecrearMedidor($query,$data) {
    	$data['codigo_qr'] = null;
    	$this->create($data->all());
    	$lastId = $this->all()->last()->id;
    	return $lastId;
    }

    public function scopeallOrdering($query,$column,$order){
        return $query->
        select('id','consumo_m3','codigo_qr')->orderBy($column, $order)
            ->get();
    }

    public function scopeactualizar($query,$request,$id) {
        $medidor = $this->find($id);
        $medidor->consumo_m3 = $request['consumo_m3'];
        $medidor->codigo_qr = null;
        $medidor->save();
        $lastId = $this->all()->last()->id;
        return $lastId;
    }

    public function scopeasignarInstalacions($query,$idMedidor,$idInstalacion) {
        $medidor = $this::find($idMedidor);
        $medidor->id_instalacion = $idInstalacion;
        $medidor->update();
        return true;
    }

    public function instalacion() {
        return $this->hasOne('App\Instalacion','id','id_instalacion');
    }
}
