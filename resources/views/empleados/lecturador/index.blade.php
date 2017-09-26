@extends('layouts.app1')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Lecturadores</h2>
            <ol class="breadcrumb">
                <li>
                    Empleados
                </li>
                <li class="active">
                    <strong>Lecturadores</strong>
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
                        <a href="{{ url('lecturador/crear') }}"><button class="btn btn-success"> Crear lecturador</button></a>
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
                                    <th>Ci</th>
                                    <th>Nombre completo</th>
                                    <th>Email</th>
                                    <th>Teléfono fijo</th>
                                    <th>Teléfono celular</th>
                                    <th>Fecha de Registro</th>
                                    <th>Funciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($lecturadores as $lecturador)
                                    <tr class="gradeX">
                                        <td>{{ $lecturador->ci }}</td>
                                        <td>{{ $lecturador->nombres }} {{ $lecturador->apellido_paterno }} {{ $lecturador->apellido_materno }} </td>
                                        <td>{{ $lecturador->email }}</td>
                                        <td>{{ $lecturador->telefono_fijo }}</td>
                                        <td>{{ $lecturador->telefono_celular }}</td>
                                        <td>{{ $lecturador->created_at }}</td>
                                        <td class="center">
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                            <a href="{{ route('lecturador/editar',['ci' => $lecturador->ci ]) }}">
                                                <button class="btn btn-default">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            <a href="{{ url('domicilios') }}/{{ $lecturador->ci }}">
                                                <button class="btn btn-default">
                                                    Ver rutas
                                                </button>
                                            </a>
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
                @if(Session::has('STORE_LECTURADOR') && Session::get('STORE_LECTURADOR') == '1')
                showToast("Lecturador","Registro del lecturador exitoso","success");
                {{ Session::forget('STORE_LECTURADOR') }}
                @endif
            });
        </script>
    @endpush

@endsection