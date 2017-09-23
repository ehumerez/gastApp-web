@extends('layouts.app1')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Clientes</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index-2.html">Instalaciones</a>
                </li>
                <li class="active">
                    <strong>Clientes</strong>
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
                        <a href="{{ url('cliente/crear') }}"><button class="btn btn-success"> Crear cliente</button></a>
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

                        <div class="table-responsive">
                            <table data-order='[[ 0, "desc" ]]' class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Ci</th>
                                    <th>Código cliente</th>
                                    <th>Nombre completo</th>
                                    <th>Funciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clientes as $cliente)
                                    <tr class="gradeX">
                                        <td>{{ $cliente->ci }}</td>
                                        <td>{{ $cliente->cliente_codigo }}</td>
                                        <td>{{ $cliente->nombres }} {{ $cliente->apellido_paterno }} {{ $cliente->apellido_materno }}
                                        </td>
                                        <td class="center">
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                            <button class="btn btn-default">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                            <a href="{{ url('domicilios') }}/{{ $cliente->ci }}">
                                                <button class="btn btn-default">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                    Ver domicilios
                                                </button></a>
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

        <!-- Custom and plugin javascript -->
        <script src="{{ asset('site/js/inspinia.js') }}"></script>
        <script src="{{ asset('site/js/plugins/pace/pace.min.js') }}"></script>
        <!-- Page-Level Scripts -->
        <script>
            $(document).ready(function(){
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
        <script>
            $(function () {
                @if(Session::has('STORE_CLIENTE') && Session::get('STORE_CLIENTE') == '1')
                showToast("Cliente","Registro del cliente exitoso","success");
                {{ Session::forget('STORE_CLIENTE') }}
                @endif
            });
        </script>
    @endpush

@endsection