@extends('layouts.app1')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Editar Registro de Instalación {{ $data->id }}</h2>
            <ol class="breadcrumb">
                <li>
                    Instalación
                </li>
                <li>
                    <a href="{{ route('instalaciones') }}">Solicitudes</a>
                </li>
                <li class="active">
                    <strong>Editar</strong>
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
                        <h5>Datos para la edición</h5>
                    </div>
                    <div class="ibox-content">

                        <div>
                            {!! Form::model($data,['url' => 'instalacion/store','method'=>'POST','class' => 'form-horizontal', 'name' => 'frm-data-store-instalacion', 'id' => 'frm-data-store-instalacion']) !!}

                            <div class="form-group validate-cliente" id="div-ci">
                                <label class="col-sm-2 control-label">Cliente *</label>
                                <div class="col-sm-10">
                                    <select name="ci_cliente" class="form-control" id="edt-ci" required disabled>
                                        <option value="sinSeleccion">Seleccione un cliente..</option>
                                        @foreach($data->clientes as $cat)
                                            @if($cat->ci == $data->ci)
                                                <option value="{{$cat->ci }}" selected>CI: {{$cat->ci }}, {{ $cat->nombres }} {{ $cat->apellido_paterno }} {{ $cat->apellido_materno }}</option>
                                            @else
                                                <option value="{{$cat->ci }}">CI: {{$cat->ci }}, {{ $cat->nombres }} {{ $cat->apellido_paterno }} {{ $cat->apellido_materno }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <p id="err-edt-ci" class="help-block err-div"></p>
                                </div>
                                <p id="err-edt-ci" class="help-block err-div"></p>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group validate-cliente" id="div-ci">
                                <label class="col-sm-2 control-label">Domicilios del cliente *</label>
                                <div class="col-sm-10">
                                    <select name="id_domicilio_cliente" class="form-control" id="id_domicilio_cliente" disabled>
                                        <option value="">ID: {{ $data->id_domicilio_cliente }} - {{ $data->direccion }} NRO: {{ $data->nro }}</option>
                                    </select>
                                </div>
                                <p id="err-edt-ci" class="help-block err-div"></p>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Medidor </label>
                                <div class="col-sm-10">
                                    {{--<input type="text" name="cliente_codigo" class="form-control">--}}
                                    <p>Medidores que aún no tienen asignado una instalación.</p>
                                    {!! Form::select('id_medidor', $data->medidores, $data->id_medidor, ['class' => 'form-control', 'id' => 'edt-ciudad','required']) !!}
                                    <p id="err-edt-id_medidor" class="help-block err-div"></p>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Categoría de Instalación </label>
                                <div class="col-sm-10">
                                    {{--<input type="text" name="cliente_codigo" class="form-control">--}}
                                    {!! Form::select('id_categoria_instalacion', $data->categorias, $data->categoria_instalacion_descripcion, ['class' => 'form-control', 'id' => 'edt-ciudad','required']) !!}
                                    <p id="err-edt-id_medidor" class="help-block err-div"></p>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="control-label">Detalle:</label><br>
                                    <div class="summernote">
                                        <h3>Descripción de la instalación</h3>
                                    </div>
                                </div>
                            </div>
                            {!! Form::text('instalacion_detalle', '',['class'=>'hidden','id' => 'detalle']) !!}
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Metros de excedente</label>
                                <div class="col-sm-10">
                                    <p>Si los hubiera previa inspección técnica.</p>
                                    <div class="input-group m-b">
                                        <span class="input-group-addon"></span>
                                        <input type="number" name="mts_excedente" min="0" class="form-control" value="{{ $data->mts_excedente }}">
                                    </div>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Observaciones:</label>
                                <div class="col-sm-10">
                                    <div class="input-group m-b">
                                        <span class="input-group-addon"><i class="fa fa-wrench" aria-hidden="true"></i></span>
                                        <input type="text" name="observaciones" class="form-control" value="{{ $data->observaciones }}">
                                    </div>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-2 col-md-2"></div>
                                <div class="col-sm-2 col-md-2"></div>
                                <div class="col-sm-2 col-md-2"></div>
                                <div class="col-sm-2 col-md-2"></div>
                                <div class="col-sm-2 col-md-2">
                                    <a href="{{ route('instalaciones') }}" class="btn btn-default" type="button">Cancelar</a>
                                </div>
                                <div class="col-sm-2 col-md-2">
                                    <button class="btn btn-primary" type="submit" onclick="vall()">Guardar cambios</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
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
                var a = "{{ $data->instalacion_detalle }}";
                $('.summernote').summernote('code',a);
            });

            $('#edt-ci').change(function (e) {
                if($(this).val() == "sinSeleccion") {
                    var b = '<option value="">Para ver los domicilios seleccione un cliente.</option>';
                    $('#id_domicilio_cliente').html(b);
                }
                var url = '{{ url('') }}';
                url = url + '/domicilios/cliente/'+$(this).val();
                $.ajax({
                    //headers: { 'X-CSRF-TOKEN' : '{ csrf_token() }}' },
                    url: url,
                    data: '',
                    method:'GET'
                    //cache:false
                })
                    .done(function(result) {
                        //console.log(result.respuesta);
                        if (result.respuesta === 'ok') {
                            //console.log(result.ci)
                            var domicilios = result.domicilios;
                            var a = '';
                            $('#id_domicilio_cliente').html("");
                            if(domicilios == "") {
                                a = a + '<option value=""> El cliente cuenta con instalación en todos sus domicilios. Agregue un nuevo domicilio.</option>';
                                $('#id_domicilio_cliente').html(a);
                            }else {
                                $.each(domicilios,function (i, val) {
                                    console.log(val);
                                    a = a + '<option value="'+val.id+'"> Id Domicilio: '+ val.id +', Referencia: '+val.direccion+', Nro: '+val.nro +'</option>';
                                })
                                $('#id_domicilio_cliente').html(a);
                            }
                            console.log(domicilios)
                            /*var dir = result.direcciones;
                            var a = '';
                            $.each(dir,function (i,val) {
                                a = a + '<option value="'+val.id+'">'+val.direccion+'</option>';
                            });
                            $('#id_domicilio_cliente').html(a);*/
                        }
                    })
                    .fail(function(data){
                        var errors = data.responseJSON;
                        console.log(errors);
                    });
            })

            function vall(){
                var valor = $('.summernote').summernote('code');
                $('#detalle').val(valor);
            }
        </script>
    @endpush
@endsection