@extends('layouts.app1')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Técnicos</h2>
            <ol class="breadcrumb">
                <li>
                    Empleados
                </li>
                <li class="active">
                    <strong>Técnicos</strong>
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
                        <a href="{{ url('tecnico/crear') }}"><button class="btn btn-success"> Crear tecnico</button></a>
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
                                @foreach($tecnicos as $tecnico)
                                    <tr class="gradeX">
                                        <td>{{ $tecnico->ci }}</td>
                                        <td>{{ $tecnico->nombres }} {{ $tecnico->apellido_paterno }} {{ $tecnico->apellido_materno }} </td>
                                        <td>{{ $tecnico->email }}</td>
                                        <td>{{ $tecnico->telefono_fijo }}</td>
                                        <td>{{ $tecnico->telefono_celular }}</td>
                                        <td>{{ $tecnico->created_at }}</td>
                                        <td class="center">
                                            <button class="btn btn-danger">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                            <a href="{{ route('tecnico/editar',['ci' => $tecnico->ci ]) }}">
                                                <button class="btn btn-default">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            <a href="{{ url('domicilios') }}/{{ $tecnico->ci }}">
                                                <button class="btn btn-default">
                                                    Ver reclamos
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

        <!-- Custom and plugin javascript -->
        <script src="{{ asset('site/js/inspinia.js') }}"></script>
        <script src="{{ asset('site/js/plugins/pace/pace.min.js') }}"></script>

        <script>
            $(function () {
                @if(Session::has('STORE_TECNICO') && Session::get('STORE_TECNICO') == '1')
                showToast("Técnico","Registro del ténico exitoso","success");
                {{ Session::forget('STORE_TECNICO') }}
                @endif
            });
        </script>
    @endpush

@endsection