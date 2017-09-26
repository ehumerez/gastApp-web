@extends('layouts.app1')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Asignar Recorrido: {{ $recorrido->id }}</h2>
            <ol class="breadcrumb">
                <li>
                    Cobranza
                </li>
                <li>
                    <a href="{{ url('recorridos') }}">Recorridos</a>
                </li>
                <li class="active">
                    <strong>Asignar</strong>
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
                        <h5>Lecturadores sin asignar</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="ibox-content">

                        <div>
                            {!! Form::open(['route' => ['recorrido/store-asignacion',$recorrido->id],'method'=>'POST','class' => 'form-horizontal', 'name' => 'frm-data-store-recorridos', 'id' => 'frm-data-store-recorridos']) !!}
                            <div class="hr-line-dashed"></div>
                            <div class="form-group validate-cliente" id="div-recorrido_descripcion">
                                {{--<label class="col-sm-2 control-label">Descripción:</label>--}}
                                <div class="col-sm-3"></div>
                                <div class="col-sm-6">
                                    <p>Seleccione un lecturador</p>
                                    <select name="ci_lecturador" class="form-control" required>
                                        @foreach($lecturadores as $lecturador)
                                            <option value="{{ $lecturador->ci }}">{{ $lecturador->ci }} {{ $lecturador->nombres }} {{ $lecturador->apellido_paterno }} {{ $lecturador->apellido_materno }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <p id="err-edt-recorrido_descripcion" class="help-block err-div"></p>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group" id="guardar">
                                <div class="col-sm-2 col-md-2"></div>
                                <div class="col-sm-2 col-md-2"></div>
                                <div class="col-sm-2 col-md-2"></div>
                                <div class="col-sm-2 col-md-2"></div>
                                <div class="col-sm-2 col-md-2">
                                    <a href="{{ route('recorridos') }}" class="btn btn-default">Cancelar</a>
                                </div>
                                <div class="col-sm-2 col-md-2">
                                    <button class="btn btn-primary" type="submit"  id="btn-crear-recorrido">Guardar cambios</button>
                                </div>
                            </div>

                            {!! Form::close() !!}

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
    @push('head')
        <link href="{{ asset('site/css/plugins/steps/jquery.steps.css') }}" rel="stylesheet">
    @endpush
    @push('scripts')

        <!-- Steps -->
        <script src="{{ asset('site/js/plugins/steps/jquery.steps.min.js') }}"></script>
        <!-- Jquery Validate -->
        <script src="{{ asset('site/js/plugins/validate/jquery.validate.min.js') }}"></script>

        <script src="{{ asset('site/js/plugins/dataTables/datatables.min.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('.dataTables-example').DataTable({
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                    },
                    pageLength: 25,
                    responsive: true,
                    ordering: true,
                    dom: '<"html5buttons"B>lTfgitp',
                    buttons: [
                        { extend: 'copy'},
                        {extend: 'csv'},
                        {extend: 'excel', title: 'ExampleFile'},
                        {extend: 'pdf', title: 'ExampleFile'},

                        {extend: 'print',
                            customize: function (win){
                                $(win.document.body).addClass('white-bg');
                                $(win.document.body).css('font-size', '10px');

                                $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                            }
                        }
                    ]

                });
            });
        </script>

    @endpush
@endsection