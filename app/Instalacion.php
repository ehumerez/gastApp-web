<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use DB;

class Instalacion extends Model
{
    protected $table = 'instalacion';

    protected $fillable = ['id_domicilio_cliente', 'id_categoria_instalacion', 'id_estado_instalacion','id_recorrido',
        'instalacion_detalle', 'mts_excedente', 'observaciones'];

    public function medidor()
    {
        return $this->hasOne('App\Medidor', 'id_instalacion', 'id');
    }

    public function categoriaInstalacion()
    {
        return $this->belongsTo('App\CategoriaInstalacion', 'id_categoria_instalacion');
    }

    public function estadoInstalacion() {
        return $this->belongsTo('App\EstadoInstalacion','id_estado_instalacion');
    }

    public function domicilioCliente() {
        return $this->belongsTo('App\DomicilioCliente','id_domicilio_cliente');
    }

    public function recorrido() {
        return $this->belongsTo('App\Recorrido','id_recorrido');
    }

    public function scopegetAvisoCobranza($query,$id) {
        $data = DB::table('medidor as m')
            ->join('instalacion as i','i.id','=','m.id_instalacion')
            ->join('estado_instalacion as ei','ei.id','=','i.id_estado_instalacion')
            ->join('domicilio_cliente as dc','dc.id','=','i.id_domicilio_cliente')
            ->join('persona as c','c.ci','=','dc.ci_cliente')
            ->join('categoria_instalacion as ci','ci.id','=','i.id_categoria_instalacion')
            ->select('c.ci','c.nombres','c.apellido_paterno','c.apellido_materno',
                'm.consumo_m3','dc.direccion','ei.estado_instalacion_descripcion')
            ->where('m.id',$id)
            ->where('m.id_instalacion','!=',null)
            ->where('c.TC',1)
            ->limit(10)
            ->get();
        return $data;
    }

    public function scopecrear($query,$request) {
        $request['id_estado_instalacion'] = 1;
        $this->create($request->all());
        return $this->all()->last()->id;
    }

    /*public function scopegetAvisoCobranza2($query,$id) {
        $data = DB::table('estado_instalacion as ei')
            ->join('instalacion_estado_instalacion as iei','iei.id_estado_instalacion','=','ei.id')
            ->join('instalacion as i','i.id','=','iei.id_instalacion')
            ->join('medidor as m','i.id','=','m.id_instalacion')
            ->join('domicilio_cliente as dc','dc.id','=','i.id_domicilio_cliente')
            ->join('persona as c','c.ci','=','dc.ci_cliente')
            ->join('categoria_instalacion as ci','ci.id','=','i.id_categoria_instalacion')
            ->select('c.ci','c.nombres','c.apellido_paterno','c.apellido_materno',
                'm.consumo_m3','dc.direccion','ei.estado_instalacion_descripcion')
            ->where('m.id',$id)
            ->where('m.id_instalacion','!=',null)
            ->where('c.TC',1)
            ->where('iei.id_estado_instalacion',1)
            ->orderBy('iei.created_at','asc')
            ->limit(10)
            ->get();
        return $data;
    }*/

    public function scopegetAllInstalaciones($query) {
        $data = DB::table('instalacion as i')
            ->join('estado_instalacion as ei','ei.id','=','i.id_estado_instalacion')
            ->distinct()
            ->get();
        return $data;
    }
/*$data->clientes = DB::table('domicilio_cliente as dc')
->join('persona as c','c.ci','=','dc.ci_cliente')
->select('c.ci','c.nombres','c.apellido_paterno','c.apellido_materno')
->where('c.TC',1)
->orderBy('c.nombres','asc')
->distinct()
->get();
$medidores = Medidor::where('id_instalacion',null)->orderBy('id')->pluck('consumo_m3','id');
$data->medidores =  ['' => 'Seleccione un opcion ..'] + $medidores->toArray();
$data->domicilios = DomicilioCliente::where('ci_cliente','!=',null)->distinct()->get();
$categorias = CategoriaInstalacion::all()->pluck('categoria_instalacion_descripcion','id');
$data->categorias = ['' => 'Seleccione un opcion ..'] + $categorias->toArray();*/

    public function scopegetInstalacionParaMostrarView($query,$id) {
        $instalacion = DB::table('instalacion as i')
            ->join('domicilio_cliente as dc','dc.id','=','i.id_domicilio_cliente')
            ->join('persona as c','c.ci','=','dc.ci_cliente')
            ->join('medidor as m','m.id_instalacion','=','i.id')
            ->join('categoria_instalacion as ci','ci.id','=','i.id_categoria_instalacion')
            ->join('estado_instalacion as ei','ei.id','=','i.id_estado_instalacion')
            ->select('i.id','c.ci','c.nombres','c.apellido_paterno','c.apellido_materno',
                'dc.id as id_domicilio_cliente','dc.direccion','dc.nro',
                'm.id as id_medidor','ci.categoria_instalacion_descripcion',
                'i.instalacion_detalle','i.mts_excedente','i.observaciones','ei.estado_instalacion_descripcion','ei.icono')
            ->where('i.id',$id)
            ->first();
        //return $this->all()->last()->id;
        return $instalacion;
    }

    public function scopecrearDesdeRecorrido($query,$idRecorrido,$request) {
        $idInstalacion = $request['idinstalacion'];
        $c = 0;
        while($c < count($idInstalacion)) {
            $instalacion = $this->find($idInstalacion[$c]);
            $instalacion->id_recorrido = $idRecorrido;
            $instalacion->update();
            $c = $c + 1;
        }
        return $this->all()->last()->id;
    }

    public function scopeverRutas($query,$idRecorrido,$idLecturador)
    {
        return $query->has('recorrido')->where('id_recorrido',$idRecorrido)->get();
    }
}
