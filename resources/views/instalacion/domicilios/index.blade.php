@extends('layouts.app1')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Lista de domicilios del cliente {{ $cliente->nombres }} {{ $cliente->apellido_paterno }} {{ $cliente->apellido_materno }}</h2>
            <ol class="breadcrumb">
                <li>
                    Instalaciones
                </li>
                <li>
                    <a href="{{ url('clientes') }}">Clientes</a>
                </li>
                <li class="active">
                    <strong>Domicilios</strong>
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
                        <a href="{{ url('domicilios/crear') }}/{{ $cliente->ci }} "><button class="btn btn-success"> Registrar nuevo domicilio: </button></a>
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
                                    <th>Id</th>
                                    <th>Dirección</th>
                                    <th>U.V.</th>
                                    <th>Manzana</th>
                                    <th>Lote</th>
                                    <th>Nro</th>
                                    {{--<th>Instalación</th>--}}
                                    <th>Funciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($domicilios)>0)
                                @foreach($domicilios as $direccion)
                                    {{--@if($direccion->cliente != '')--}}
                                    <tr class="gradeX">
                                        <td>{{ $direccion->id }}</td>
                                        <td>{{ $direccion->direccion }}</td>
                                        <td>{{ $direccion->uv }} </td>
                                        <td>{{ $direccion->manzana }}</td>
                                        <td>{{ $direccion->lote }}</td>
                                        <td>{{ $direccion->nro }}</td>
                                        {{--<td>{{ $direccion->instalacion->id }}</td>--}}
                                        <td class="center">
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </button>
                                            <button class="btn btn-info">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                            <button type="button" id="btn-get-mapa" onclick="init({{ $direccion->lat }} ,{{ $direccion->lng }} ,'{{ $direccion->direccion }}')" class="btn btn-facebook btn-get-mapa" data-toggle="modal" data-target="#myModal2">
                                                <i class="fa fa-map-o" aria-hidden="true"></i>
                                                Ver mapa
                                            </button>
                                        </td>
                                    </tr>
                                    {{--@endif--}}
                                @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @include('instalacion.instalacion.mapa_modal')
            @include('instalacion.domicilios.delete_modal')
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
                @if(Session::has('STORE_CLIENTE') && Session::get('STORE_CLIENTE') == '1')
                showToast("Cliente","Registro del cliente exitoso","success");
                {{ Session::forget('STORE_CLIENTE') }}
                @endif
            });
        </script>

        <!--
     You need to include this script on any page that has a Google Map.
     When using Google Maps on your own site you MUST signup for your own API key at:
     https://developers.google.com/maps/documentation/javascript/tutorial#api_key
     After your sign up replace the key in the URL below..
    -->
        {{--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQTpXj82d8UpCi97wzo_nKXL7nYrd4G70"></script>--}}
        <script type="text/javascript">
            //google.maps.event.addDomListener(window,'load',init);
            function init(lat1,lng1,direccion) {
               // var dir = extraerDir();
                //var latLng = {lat: -17.7349020, lng: -63.181255};
                var latLng = {lat: lat1, lng: lng1};
                // Options for Google map
                // More info see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions1 = {
                    zoom: 12,
                    //center: new google.maps.LatLng(),
                    center: latLng,
                };

                // Get all html elements for map
                var mapElement1 = document.getElementById('map1');

                // Create the Google Map using elements
                var map1 = new google.maps.Map(mapElement1, mapOptions1);
                //addMarker(latLng,map1);
                var marker = new google.maps.Marker({
                    position: latLng,
                    label: 'Direccion',
                    map: map1
                });
            }

            function getLatLng(idC,idD) {
                //var  u = '{{ url("") }}'+'/domicilio/ver-mapa/' + idC;
                var  u = '{{ url("") }}'+'/domicilio/ver-mapa';
                //$('#btn-get-mapa').attr('url_action','{ route("domicilio/ver-mapa") }}');
                //$('#btn-get-mapa').attr('url_action','{ action('DomicilioClienteController@getLatLng', ['id' => idC]) }}');

                    //e.preventDefault();
                    //var data = $('#frm-data-store-cliente').serialize();
                    var url2 = $('#btn-get-mapa').attr('url_action');
                    var data1 = {
                        ci:idC,
                        id_domicilio:idD
                    }
                    $.ajax({
                        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
                        url: u,
                        data: data1,
                        method:'POST'
                        //cache:false
                    })
                        .done(function(result) {
                            console.log(result.respuesta);
                            if (result.respuesta === 'ok') {
                                //window.location = result.redirect_url;
                                var x = {
                                    lat:result.lat,
                                    lng:result.lng
                                }
                                console.log(result.lat,result.lng);
                                init(result.lat,result.lng);
                            } else {
                                showToast('Error al obtener el mapa',result.respuesta,'error');
                            }
                        })
                        .fail(function(data){
                            var errors = data.responseJSON;
                            showToast('Error','Intente nuevamente por favor.','error');
                        });
            }
        </script>
        <script>
            function addMarker(location, map) {
                var marker = new google.maps.Marker({
                    position: location,
                    label: 'Domicilio',
                    map: map
                });
            }
        </script>
    @endpush
@endsection