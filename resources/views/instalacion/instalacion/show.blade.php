@extends('layouts.app1')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Instalación: {{ $instalacion->id }}</h2>
            <ol class="breadcrumb">
                <li>
                    Instalación
                </li>
                <li>
                    <a href="{{ route('instalaciones') }}">Solicitudes</a>
                </li>
                <li class="active">
                    <strong>Ver</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Datos de la instalación</h5>
                    </div>
                    <div class="ibox-content">
                        <div>
                            <div class="row">
                                <div class="form-group validate-cliente" id="div-ci">
                                    <label class="col-sm-2 control-label">Cliente </label>
                                    <div class="col-sm-4">
                                        <p> {{ $instalacion->nombres }} {{ $instalacion->apellido_paterno }} {{ $instalacion->apellido_materno }}</p>
                                    </div>
                                    <label class="col-sm-2 control-label">Estado de la instalación:</label>
                                    <div class="col-sm-4">
                                        <p><span class="badge badge-{{ $instalacion->icono }}"> {{ $instalacion->estado_instalacion_descripcion }} </span></p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group validate-cliente" id="div-ci">
                                    <label class="col-sm-2 control-label">Domicilios del cliente;</label>
                                    <div class="col-sm-10">
                                        <p>ID: {{ $instalacion->id_domicilio_cliente }} - {{ $instalacion->direccion }} - NRO: {{ $instalacion->nro }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Medidor </label>
                                    <div class="col-sm-10">
                                        <p> {{ $instalacion->id_medidor }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Categoría de Instalación </label>
                                    <div class="col-sm-10">
                                        <p> {{ $instalacion->categoria_instalacion_descripcion }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="control-label">Detalle:</label><br>
                                        <div class="summernote">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Metros de excedente</label>
                                    <div class="col-sm-10">
                                        <p> {{ $instalacion->mts_excedente }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Observaciones:</label>
                                    <div class="col-sm-10">
                                        <p> {{ $instalacion->observaciones }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-2 col-md-2"></div>
                                    <div class="col-sm-2 col-md-2"></div>
                                    <div class="col-sm-2 col-md-2"></div>
                                    <div class="col-sm-2 col-md-2"></div>
                                    <div class="col-sm-2 col-md-2"></div>
                                    <div class="col-sm-2 col-md-2">
                                        <a href="{{ route('instalaciones') }}" class="btn btn-default" type="button">Volver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @push('head')
        <link href="{{ asset('site/css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">
        <link href="{{ asset('site/css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('site/css/plugins/summernote/summernote.css') }}" rel="stylesheet">
        <link href="{{ asset('site/css/plugins/summernote/summernote-bs3.css') }}" rel="stylesheet">
    @endpush
    @push('scripts')
        <!-- Mainly scripts -->
        <script src="{{ asset('site/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
        <script src="{{ asset('site/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
        <!-- SUMMERNOTE -->
        <script src="{{ asset('site/js/plugins/summernote/summernote.min.js') }}"></script>
        <!-- Steps -->
        <script src="{{ asset('site/js/plugins/steps/jquery.steps.min.js') }}"></script>
        <!-- Jquery Validate -->
        <script src="{{ asset('site/js/plugins/validate/jquery.validate.min.js') }}"></script>
        <!-- Custom and plugin javascript -->
        <script src="{{ asset('site/js/inspinia.js') }}"></script>
        <script src="{{ asset('site/js/plugins/pace/pace.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                var content = '{{ $instalacion->instalacion_detalle }}';
                $('.summernote').summernote('code',content);
            });
        </script>
    @endpush
@endsection