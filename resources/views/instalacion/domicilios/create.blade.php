@extends('layouts.app1')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Formulario Registro de Domicilio para el cliente: {{ $data->nombres }} {{ $data->apellido_paterno }} {{ $data->apellido_materno }}</h2>
            <ol class="breadcrumb">
                <li>
                    Instalaciones
                </li>
                <li>
                    <a href="{{ url('clientes') }}">Cliente</a>
                </li>
                <li>
                    <a href="{{ route('domicilios',['id' => $data->ci]) }}">Domicilio</a>
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
                        <h5>Dirección del Cliente</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
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
                            {!! Form::open(['route' => ['domicilios/store',$data->ci],'method'=>'POST','class' => 'form-horizontal', 'name' => 'frm-data-store-domicilios', 'id' => 'frm-data-store-domicilios']) !!}

                            <div class="form-group validate-cliente" id="div-direccion">
                                <label class="col-sm-2 control-label">Dirección:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="direccion" class="form-control">
                                </div>
                                <p id="err-edt-direccion" class="help-block err-div"></p>
                            </div>
                            <div class="form-group validate-cliente" id="div-uv">
                                <div class="row">
                                    <div class="hr-line-dashed"></div>
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-5">
                                        <label class="control-label">Municipio:</label>
                                        <select name="id_municipio" class="form-control">
                                            @foreach($municipios as $municipio)
                                                <option value="{{$municipio->id }}">{{ $municipio->municipio_nombre }}</option>
                                            @endforeach
                                        </select>
                                        <p id="err-edt-manzana" class="help-block err-div"></p>
                                    </div>
                                    <div class="col-sm-5">
                                        <label class="control-label">UV:</label>
                                        <input type="text" name="uv" class="form-control">
                                        <p id="err-edt-uv" class="help-block err-div"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group validate-cliente" id="div-uv">
                                <div class="row">
                                    <div class="hr-line-dashed"></div>
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-3">
                                        <label class="control-label">Manzana:</label>
                                        <input type="number" name="manzana" step="any" class="form-control">
                                        <p id="err-edt-manzana" class="help-block err-div"></p>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="control-label">Lote:</label>
                                        <input type="text" name="lote" class="form-control">
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="control-label">Número de domicilio:</label>
                                        <input type="text" name="nro" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="lat" id="lat">
                            <input type="hidden" name="lng" id="lng">
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                    <h3>Seleccionar domicilio en el mapa:</h3>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-2 col-md-2">
                                    <input class="btn btn-danger" onclick="deleteMarkers();" type=button value="Eliminar Marcadores">
                                </div>
                                <div class="col-sm-2 col-md-2">
                                    <input class="btn btn-success" onclick="deleteMarkerLast();" type=button value="Eliminar Marcador">
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="google-map" id="map1"></div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-2 col-md-2"></div>
                                <div class="col-sm-2 col-md-2"></div>
                                <div class="col-sm-2 col-md-2"></div>
                                <div class="col-sm-2 col-md-2"></div>
                                <div class="col-sm-2 col-md-2">
                                    <a href="{{ route('domicilios',['id' => $data->ci]) }}" class="btn btn-default">Cancelar</a>
                                </div>
                                <div class="col-sm-2 col-md-2">
                                    <button class="btn btn-primary" type="submit"  id="btn-crear-domicilio">Guardar cambios</button>
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
        <script>
            $(document).ready(function () {
                $('#verborgen_file').hide();
                $('#pf_foto').css('background-image', 'url("'+'{{ asset('site/img/profile_big.jpg') }}'+'")');
                $('#pf_foto').on('click', function () {
                    $('#verborgen_file').click();
                });
                $('#verborgen_file').change(function () {
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.onloadend = function () {
                        $('#pf_foto').css('background-image', 'url("' + reader.result + '")');
                    }
                    if (file) {
                        reader.readAsDataURL(file);
                    } else {
                        $('#pf_foto').css('background-image', 'url("")');
                    }

                });
                $("[name='frm-data-img']").submit(function(e){
                    var file=$("#verborgen_file").val();
                    if(file==''){
                        alert("Porfavor seleccione una imagen");
                        e.preventDefault();
                    }else{

                    }
                });
            });

        </script>

        <!--
     You need to include this script on any page that has a Google Map.
     When using Google Maps on your own site you MUST signup for your own API key at:
     https://developers.google.com/maps/documentation/javascript/tutorial#api_key
     After your sign up replace the key in the URL below..
    -->
        {{--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbuAVJ5XCTib6-mkZSOLtY9rnGenBHlJE"></script>--}}

        <script type="text/javascript">
            google.maps.event.addDomListener(window,'load',init);
            // In the following example, markers appear when the user clicks on the map.
            // Each marker is labeled with a single alphabetical character.
            var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            var labelIndex = 0;
            var markers = [];
            function init() {
                var latLng = {lat:-17.7349020,lng: -63.181255};
                var mapOptions1 = {
                    zoom: 12,
                    center: new google.maps.LatLng(latLng),
                    // Style for Google Maps
                    styles: [{"featureType":"water","stylers":[{"saturation":43},{"lightness":-11},{"hue":"#0088ff"}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":99}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"color":"#808080"},{"lightness":54}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#ece2d9"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"color":"#ccdca1"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#767676"}]},{"featureType":"road","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#b8cb93"}]},{"featureType":"poi.park","stylers":[{"visibility":"on"}]},{"featureType":"poi.sports_complex","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","stylers":[{"visibility":"on"}]},{"featureType":"poi.business","stylers":[{"visibility":"simplified"}]}]
                };

                // Get all html elements for map
                var mapElement1 = document.getElementById('map1');

                // Create the Google Map using elements
                var map1 = new google.maps.Map(mapElement1, mapOptions1);

                // This event listener calls addMarker() when the map is clicked.
                google.maps.event.addListener(map1, 'click', function(event) {
                    addMarker(event.latLng, map1);
                });
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
                var a = location.toJSON();
                console.log("Latitud: "+a.lat+" Longitud: "+a.lng);
                markers.push(marker);
                $('#lat').val(a.lat);
                $('#lng').val(a.lng);
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