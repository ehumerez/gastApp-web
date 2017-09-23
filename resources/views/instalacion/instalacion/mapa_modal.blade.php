<div class="modal inmodal" id="myModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Dirección: @if($direccion != null){{ $direccion->direccion }} @endif</h4>
                <small class="font-bold">Cliente: @if($cliente != null) {{ $cliente->nombres }} {{ $cliente->apellido_paterno }} {{ $cliente->apellido_materno }} @endif</small>
            </div>
            <div class="modal-body">
                <div class="google-map" id="map1"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>