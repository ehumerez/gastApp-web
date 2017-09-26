@extends('layouts.app1')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Medidor</h2>
        <ol class="breadcrumb">
            <li>
                Instalación
            </li>
            <li>
                <a href="{{ route('medidor/index') }}">Medidor</a>
            </li>
            <li class="active">
                <strong>Crear</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                {!! Form::open(['route' => 'medidor/store','method' => 'POST','class' => 'form-horizontal', 'name' => 'frm-data-medidores', 'id' => 'frm-data-medidores']) !!}
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                        	<label class="col-sm-2 control-label">Consumo (m^3)</label>
                            <div class="col-sm-10">
                            	<input type="number" name="consumo_m3" min="0" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a href="{{ route('medidor/index') }}" class="btn btn-white">Cancelar</a>
                                <button class="btn btn-primary" type="submit" id="btn-crear-medidor">Guardar cambios</button>
                            </div>
                        </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection