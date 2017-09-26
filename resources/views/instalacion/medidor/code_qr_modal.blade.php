<div class="modal inmodal" id="modal-qr" tabindex="-1" role="dialog" aria-hidden="true">
    {{--{{Form::Open(['action'=>array('MedidorController@setConsumo',$medidor->id),'method'=>'delete'])}}--}}
    {{--{!! Form::open(['action' => ['MedidorController@setConsumo', $medidor->id],'method' => 'post']) !!}--}}
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Código QR</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <P>AQUI MOSTRAR EL QR</P>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar consumo</button>
            </div>
        </div>
    </div>
    {{--{{Form::Close()}}--}}
</div>