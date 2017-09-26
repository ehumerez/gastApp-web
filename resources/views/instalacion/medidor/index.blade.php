@extends('layouts.app1')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Medidores</h2>
            <ol class="breadcrumb">
                <li>
                    Instalaciones
                </li>
                <li class="active">
                    <strong>Medidores</strong>
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
                        <a href="{{ url('medidor/crear') }}"><button class="btn btn-success"> Registrar medidor</button></a>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table data-order='[[ 0, "desc" ]]' class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Consumo (m3)</th>
                                    <th>Código Instalación</th>
                                    <th>Código QR</th>
                                    <th>Funciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($medidores as $medidor)
                                <tr class="gradeX">
                                    <td>{{ $medidor->id }}</td>
                                    <td id="med-{{ $medidor->id }}">{{ $medidor->consumo_m3 }}</td>
                                    <td>
                                        @if($medidor->id_instalacion != null)
                                            <p><span class="badge badge-success">{{ $medidor->id_instalacion }}</span></p>
                                        @else
                                            <p><span class="badge badge-warning">Sin instalación asignada</span></p>
                                        @endif
                                    </td>
                                    @if($medidor->id_instalacion != null)
                                        <td>
                                            {!! QrCode::size(170)->generate(route('avisos',['id' => $medidor->id,'consumo' => $medidor->consumo_m3])) !!}
                                            {{--<button class="btn btn-default btn-get-qr" id="btn-get-qr-id" data-toggle="modal" data-target="#modal-qr">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>--}}
                                        </td>
                                        <td>
                                            <button class="btn btn-default btn-set-consumo" id="btn-set-consumo-id" data-toggle="modal" data-target="#modal-medidor">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                Cambiar consumo
                                            </button>
                                        </td>
                                        @include('instalacion.medidor.code_qr_modal')
                                        @include('instalacion.medidor.consumo_edit_modal')
                                    @else
                                        <td></td>
                                        <td></td>
                                    @endif
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
    <script>
        $(function () {
            @if(Session::has('UPDATE_MEDIDOR') && Session::get('UPDATE_MEDIDOR') == '1')
                showToast("Medidor","Actualización exitosa","success");
                {{ Session::forget('UPDATE_MEDIDOR') }}
            @endif
        });
    </script>

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
@endpush

@endsection