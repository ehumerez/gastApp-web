@extends('layouts.app1')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Formulario Solicitud Instalación</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index-2.html">Instalación</a>
                </li>
                <li>
                    <a>Solicitud</a>
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
            <div class="col-md-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Foto</h5>
                    </div>
                    <div>

                        <div class="ibox-content no-padding border-left-right">

                            <img id="pf_foto"  class="img-responsive" style="height: 350px; width: 300px;" >
                            <input type='file' name='img_avatar' id='verborgen_file' />

                        </div>
                        <div class="ibox-content profile-content">
                            <h5>
                                Observaciones
                            </h5>
                            <p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Datos personales</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div>
                            {!! Form::open(['url' => 'cliente/store','method'=>'POST','class' => 'form-horizontal', 'name' => 'frm-data-store-cliente', 'id' => 'frm-data-store-cliente']) !!}

                            <div class="form-group validate-cliente" id="div-ci">
                                <label class="col-sm-2 control-label">Cliente *</label>
                                <div class="col-sm-10">
                                    {{--<input type="number" name="ci" class="form-control">--}}
                                    {!! Form::select('ci', $data->clientes, null, ['class' => 'form-control', 'id' => 'edt-ciudad']) !!}
                                    <p id="err-edt-ci" class="help-block err-div"></p>
                                </div>
                                <p id="err-edt-ci" class="help-block err-div"></p>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Medidor </label>
                                <div class="col-sm-10">
                                    {{--<input type="text" name="cliente_codigo" class="form-control">--}}
                                    {!! Form::select('id_medidor', $data->medidores, null, ['class' => 'form-control', 'id' => 'edt-ciudad']) !!}
                                    <p id="err-edt-id_medidor" class="help-block err-div"></p>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group validate-cliente" id="div-nombres">
                                <label class="col-sm-2 control-label">Nombre completo *</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nombres" class="form-control">
                                </div>
                                <p id="err-edt-nombres" class="help-block err-div"></p>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group validate-cliente" id="div-apellido_paterno">
                                <label class="col-sm-2 control-label">Apellido paterno *</label>
                                <div class="col-sm-10">
                                    <input type="text" name="apellido_paterno" class="form-control">
                                </div>
                                <p id="err-edt-apellido_paterno" class="help-block err-div"></p>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group validate-cliente" id="div-apellido_materno">
                                <label class="col-sm-2 control-label">Apellido materno *</label>
                                <div class="col-sm-10">
                                    <input type="text" name="apellido_materno" class="form-control">
                                </div>
                                <p id="err-edt-apellido_materno" class="help-block err-div"></p>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email:</label>
                                <div class="col-sm-10">
                                    <div class="input-group m-b">
                                        <span class="input-group-addon"><i class="fa fa-at" aria-hidden="true"></i></span>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    </span>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Teléfono fijo:</label>
                                <div class="col-sm-10">
                                    <div class="input-group m-b">
                                        <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                        <input type="number" name="telefono_fijo" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Teléfono celular:</label>
                                <div class="col-sm-10">
                                    <div class="input-group m-b">
                                        <span class="input-group-addon"><i class="fa fa-mobile" aria-hidden="true"></i></span>
                                        <input type="number" name="telefono_celular" class="form-control">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
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
                    <div class="ibox-content">
                        <div>
                            <div class="form-group validate-cliente" id="div-direccion">
                                <label class="col-sm-2 control-label">Dirección:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="direccion" class="form-control">
                                </div>
                                <p id="err-edt-direccion" class="help-block err-div"></p>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group validate-cliente" id="div-uv">
                                <label class="col-sm-2 control-label">UV:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="uv" class="form-control">
                                </div>
                                <p id="err-edt-uv" class="help-block err-div"></p>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group validate-cliente" id="div-manzana">
                                <label class="col-sm-2 control-label">Manzana:</label>
                                <div class="col-sm-10">
                                    <input type="number" name="manzana" step="any" class="form-control">
                                </div>
                                <p id="err-edt-manzana" class="help-block err-div"></p>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Número de domicilio:</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nro" class="form-control">
                                </div>
                            </div>

                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <h3>Seleccionar domicilio del cliente en el mapa:</h3>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <div class="col-sm-2 col-md-2">
                                    <input class="btn btn-danger" onclick="deleteMarkers();" type=button value="Eliminar Marcadores">
                                </div>
                                <div class="col-sm-2 col-md-2">
                                    <input class="btn btn-success" onclick="deleteMarkerLast();" type=button value="Eliminar Marcador">
                                </div>
                            </div>
                            <br>
                            <div class="hr-line-dashed"></div>
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
                                    <button class="btn btn-primary" type="submit"  id="btn-crear-cliente">Guardar cambios</button>
                                </div>
                                <div class="col-sm-2 col-md-2">
                                    <button class="btn btn-default" type="submit" id="btn-crear-cliente-cancelar">Cancelar</button>
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
                $("#wizard").steps();
                $("#form").steps({
                    bodyTag: "fieldset",
                    onStepChanging: function (event, currentIndex, newIndex)
                    {
                        // Always allow going backward even if the current step contains invalid fields!
                        if (currentIndex > newIndex)
                        {
                            return true;
                        }

                        // Forbid suppressing "Warning" step if the user is to young
                        if (newIndex === 3 && Number($("#age").val()) < 18)
                        {
                            return false;
                        }

                        var form = $(this);

                        // Clean up if user went backward before
                        if (currentIndex < newIndex)
                        {
                            // To remove error styles
                            $(".body:eq(" + newIndex + ") label.error", form).remove();
                            $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                        }

                        // Disable validation on fields that are disabled or hidden.
                        form.validate().settings.ignore = ":disabled,:hidden";

                        // Start validation; Prevent going forward if false
                        return form.valid();
                    },
                    onStepChanged: function (event, currentIndex, priorIndex)
                    {
                        // Suppress (skip) "Warning" step if the user is old enough.
                        if (currentIndex === 2 && Number($("#age").val()) >= 18)
                        {
                            $(this).steps("next");
                        }

                        // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                        if (currentIndex === 2 && priorIndex === 3)
                        {
                            $(this).steps("previous");
                        }
                    },
                    onFinishing: function (event, currentIndex)
                    {
                        var form = $(this);

                        // Disable validation on fields that are disabled.
                        // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                        form.validate().settings.ignore = ":disabled";

                        // Start validation; Prevent form submission if false
                        return form.valid();
                    },
                    onFinished: function (event, currentIndex)
                    {
                        var form = $(this);

                        // Submit form input
                        form.submit();
                    }
                }).validate({
                    errorPlacement: function (error, element)
                    {
                        element.before(error);
                    },
                    rules: {
                        confirm: {
                            equalTo: "#password"
                        }
                    }
                });
                ////////////////////////////////////////////

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
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQTpXj82d8UpCi97wzo_nKXL7nYrd4G70"></script>

        <script type="text/javascript">
            google.maps.event.addDomListener(window,'load',init);
            // In the following example, markers appear when the user clicks on the map.
            // Each marker is labeled with a single alphabetical character.
            var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            var labelIndex = 0;
            var markers = [];
            function init() {
                var latLng = {lat:-17.7349020,lng: -63.181255};
                // Options for Google map
                // More info see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
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
                    //var a = event.latLng.toJSON();
                    //console.log("Latitud: "+a.lat+" Longitud: "+a.lng);
                    addMarker(event.latLng, map1);
                });

                // Add a marker at the center of the map.
                //addMarker(latLng, map1);
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