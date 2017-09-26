@extends('layouts.app1')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Crear Recorrido</h2>
            <ol class="breadcrumb">
                <li>
                    Cobranza
                </li>
                <li>
                    <a href="{{ url('recorridos') }}">Recorridos</a>
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
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Domicilios por cobrar</h5>
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
                            {!! Form::open(['route' => 'recorrido/store','method'=>'POST','class' => 'form-horizontal', 'name' => 'frm-data-store-recorridos', 'id' => 'frm-data-store-recorridos']) !!}
                            <div class="hr-line-dashed"></div>
                            <div class="form-group validate-cliente" id="div-recorrido_descripcion">
                                <label class="col-sm-2 control-label">Descripción:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="recorrido_descripcion" class="form-control" required>
                                </div>
                                <p id="err-edt-recorrido_descripcion" class="help-block err-div"></p>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group validate-cliente" id="div-tiempo_estimado">
                                <label class="col-sm-2 control-label">Tiempo estimado para recorrer (min):</label>
                                <div class="col-sm-10">
                                    <input type="number" name="tiempo_estimado" class="form-control" required>
                                </div>
                                <p id="err-edt-tiempo_estimado" class="help-block err-div"></p>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group validate-cliente" id="div-fecha">
                                <label class="col-sm-2 control-label">Fecha:</label>
                                <div class="col-sm-10">
                                    <input type="date" name="fecha" class="form-control" required>
                                </div>
                                <p id="err-edt-fecha" class="help-block err-div"></p>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <h3>Visualización de todos los domicilio:</h3>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="google-map" id="map1"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div id="domicilios"></div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="table-responsive">
                                <table data-order='[[ 0, "desc" ]]' class="table table-striped table-bordered table-hover" id="detalles" >
                                    <thead>
                                    <tr>
                                        <th>Id Instalación</th>
                                        <th>Id Domicilio</th>
                                        <th>Direccion</th>
                                        <th>Cliente</th>
                                        <th>Observaciones</th>
                                        <th>Funciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group" id="guardar">
                                <div class="col-sm-2 col-md-2"></div>
                                <div class="col-sm-2 col-md-2"></div>
                                <div class="col-sm-2 col-md-2"></div>
                                <div class="col-sm-2 col-md-2"></div>
                                <div class="col-sm-2 col-md-2">
                                    <a href="" type="reset" class="btn btn-default">Cancelar</a>
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

        <script type="text/javascript">
            google.maps.event.addDomListener(window,'load',init);
            // In the following example, markers appear when the user clicks on the map.
            // Each marker is labeled with a single alphabetical character.
            var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            var labelIndex = 0;
            var markers = [];
            var cont = 0;
            function init() {

                $('#guardar').hide();
                var latLng = {lat:-17.7349020,lng: -63.181255};
                var mapOptions1 = {
                    zoom: 12,
                    center: new google.maps.LatLng(latLng),
                    // Style for Google Maps
                    //styles: [{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"simplified"}]}]
                };
                // Get all html elements for map
                var mapElement1 = document.getElementById('map1');

                // Create the Google Map using elements
                var map1 = new google.maps.Map(mapElement1, mapOptions1);
                var c = '{{ count($instalaciones)  }}';
                var p = '';
                @foreach($instalaciones as $instalacion)
                    var lt = '{{ $instalacion->domicilioCliente->lat }}';
                    var lg = '{{ $instalacion->domicilioCliente->lng }}';
                    lt = parseFloat(lt)
                    lg = parseFloat(lg)
                    var latL = {
                        lat: lt,
                        lng: lg
                    }
                var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';
                    var t = '{{ $instalacion->domicilioCliente->direccion }}';
                    var marker = new google.maps.Marker({
                        position:latL,
                        title: '{{ $instalacion->id }}',
                        label: t,
                        @if($instalacion->id_recorrido != null)
                        icon:image
                        @endif
                    });
                    marker.setMap(map1);

//                    console.log(marker.position.lat())
//                    console.log(marker.position.lng())

                google.maps.event.addListener(marker, 'click', function () {
//                    map1.setZoom(18);
//                    map1.setCenter(marker.latLng);

                    {{--p = p + '<li>'+ '{{ $instalacion->domicilioCliente->direccion }}' +'  </li>';--}}
                    {{--$('#domicilios').html(p);--}}
                    //console.log('Click to marker'+marker)
                    var infowindow = new google.maps.InfoWindow({
                        content: '{{ $instalacion->domicilioCliente->direccion }}'
                    });
                    infowindow.open(map1,marker);
                    var fila=''+'<tr class="selected" id="fila'+cont+'">' +
                        '<td><input type="hidden" name="idinstalacion[]" value="'+'{{ $instalacion->id }}'+'">'+'{{ $instalacion->id }}'+'</td>' +
                        '<td><input type="hidden" name="iddomicilio[]" value="'+'{{ $instalacion->domicilioCliente->id }}'+'">'+'{{ $instalacion->domicilioCliente->id }}'+'</td>' +
                        '<td><input type="hidden" name="direccion[]" value="'+'{{ $instalacion->domicilioCliente->direccion }}'+'">'+'{{ $instalacion->domicilioCliente->direccion }}'+'</td>' +
                        '<td><input type="hidden" name="cliente[]" value="'+'{{ $instalacion->domicilioCliente->ci_cliente }}'+'">'+'{{ $instalacion->domicilioCliente->ci_cliente }} {{ $instalacion->domicilioCliente->cliente->nombres }} {{ $instalacion->domicilioCliente->cliente->apellido_paterno }}'+'</td>' +
                        '<td><input type="hidden" name="observaciones[]" value="'+'{{ $instalacion->observaciones }}'+'">'+'{{ $instalacion->observaciones }}'+'</td>' +
                        '<td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button>' +
                        '</tr>';
                    cont++;
                    evaluar();
                    $("#detalles").append(fila);
                });

                @endforeach
//                // This event listener calls addMarker() when the map is clicked.
//                google.maps.event.addListener(map1, 'click', function(event) {
//                    addMarker(event.latLng, map1);
//                });
            }

            function evaluar(){
                if (cont>0) {
                    $("#guardar").show();
                }else{
                    $("#guardar").hide();
                }
            }

            function eliminar(index){
                cont--;
                $("#fila" + index).remove();
                evaluar();
            }
            // Adds a marker to the map.
            function addMarker(location, map) {
                // Add the marker at the clicked location, and add the next-available label
                // from the array of alphabetical characters.
                var marker = new google.maps.Marker({
                    position: location,
                    label: labels[labelIndex++ % labels.length],
                    map: map
                });
                //var a = location.toJSON();
                //console.log("Latitud: "+a.lat+" Longitud: "+a.lng);
                //markers.push(marker);
//                $('#lat').val(a.lat);
//                $('#lng').val(a.lng);
                //console.log("Latitud PULL: "+markers[markers.length - 1].position.toJSON().lat+" Longitud PULL: "+markers[markers.length - 1].position.toJSON().lng)
            }

            // Sets the map on all markers in the array.
            function setMapOnAll(map) {
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(map);
                }
            }

            // Removes the markers from the map, but keeps them in the array.
            function clearMarkers() {
                setMapOnAll(null);
            }

            // Deletes all markers in the array by removing references to them.
            function deleteMarkers() {
                clearMarkers();
                markers = [];
            }

            function deleteMarkerLast() {
                if(markers != '') {
                    markers[markers.length - 1].setMap(null);
                    markers.pop();
                }
            }
        </script>
    @endpush
@endsection