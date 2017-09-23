@extends('layouts.app1')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Medidor</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index-2.html">Instalación</a>
            </li>
            <li>
                <a>Medidor</a>
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
                    <h5>All form elements <small>With custom checbox and radion elements.</small></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">Config option 1</a>
                            </li>
                            <li><a href="#">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                {!! Form::open(['route' => 'medidor/store','method' => 'POST','class' => 'form-horizontal', 'name' => 'frm-data-medidores', 'id' => 'frm-data-medidores']) !!}
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                        	<label class="col-sm-2 control-label">Consumo (m^3)</label>
                            <div class="col-sm-10">
                            	<input type="number" name="consumo_m3" class="form-control">
                            	<span class="help-block m-b-none">A block of help text that breaks onto a new line and may extend beyond one line.
                            	</span>
                            </div>
                        </div>
                        
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-white" type="submit" id="btn-crear-medidor-cancelar">Cancelar</button>
                                <button class="btn btn-primary" type="submit" id="btn-crear-medidor">Guardar cambios</button>
                            </div>
                        </div>
                {!! Form::close() !!} }
                </div>
            </div>
        </div>
    </div>
</div>

@endsection