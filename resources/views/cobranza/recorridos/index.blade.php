@extends('layouts.app1')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Recorridos</h2>
            <ol class="breadcrumb">
                <li>
                    Cobranza
                </li>
                <li class="active">
                    <strong>Recorridos</strong>
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
                        <a href="{{ url('recorrido/crear') }}"><button class="btn btn-success"> Crear recorrido</button></a>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table data-order='[[ 0, "desc" ]]' class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha de Registro</th>
                                    <th>Descripción</th>
                                    <th>Tiempo estimado</th>
                                    <th>Lecturador asignado</th>
                                    <th>Fecha a realizar recorrido</th>
                                    <th>Funciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($recorridos as $recorrido)
                                        <tr class="gradeX">
                                            <td>{{ $recorrido->id }}</td>
                                            <td> {{ $recorrido->created_at }}</td>
                                            <td>{{ $recorrido->recorrido_descripcion }}</td>
                                            <td>{{ $recorrido->tiempo_estimado }}</td>
                                        @if($recorrido->ci_lecturador != null)
                                            <td>CI: {{ $recorrido->lecturador->ci }} - {{ $recorrido->lecturador->nombres }} {{ $recorrido->lecturador->apellido_paterno }} {{ $recorrido->lecturador->apellido_materno }}</td>
                                        @else
                                            <td><small class="label label-info">Recorrido sin asignar</small> </td>
                                        @endif
                                            <td>{{ $recorrido->fecha }}</td>
                                            <td class="center">
                                                <a href="{{ route('recorrido/mostrar',['ci' => $recorrido->ci_lecturador,'id' => $recorrido->id]) }}"><button class="btn btn-warning">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </button></a>
                                                <a href="">
                                                    <button class="btn btn-default">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    </button>
                                                </a>
                                        @if($recorrido->ci_lecturador == null)
                                                <a href="{{ route('recorrido/asignar-lecturador',['ic'=> $recorrido->id]) }}">
                                                    <button class="btn btn-default">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Asignar Lecturador
                                                    </button>
                                                </a>
                                        @else
                                                <a href="{{ route('recorrido/asignar-lecturador',['ic'=> $recorrido->id]) }}">
                                                    <button class="btn btn-info">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        Eliminar asignación
                                                    </button>
                                                </a>
                                        @endif
                                            </td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')


        <script src="{{ asset('site/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
        <script src="{{ asset('site/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

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

        <!-- Custom and plugin javascript -->
        <script src="{{ asset('site/js/inspinia.js') }}"></script>
        <script src="{{ asset('site/js/plugins/pace/pace.min.js') }}"></script>
        <script>
            $(function () {
                @if(Session::has('STORE_RECORRIDO') && Session::get('STORE_RECORRIDO') == '1')
                showToast("Recorrido","Registro del recorrido exitoso","success");
                {{ Session::forget('STORE_RECORRIDO') }}
                @endif
            });
        </script>
    @endpush

@endsection