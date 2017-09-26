<div class="modal inmodal" id="modal-medidor" tabindex="-1" role="dialog" aria-hidden="true">
    {{--{{Form::Open(['action'=>array('MedidorController@setConsumo',$medidor->id),'method'=>'delete'])}}--}}
    {{--{!! Form::open(['action' => ['MedidorController@setConsumo', $medidor->id],'method' => 'post']) !!}--}}
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Ajustar consumo</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group">
                        {!! Form::label('consumo_m3', 'Consumo m3: ') !!}
                        {!! Form::number('consumo_m3','',['class' => 'form-group','id' => 'txt_consumo']) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary" onclick="setConsumo({{ $medidor->id }})">Guardar consumo</button>
            </div>
        </div>
    </div>

</div>
@push('scripts')
    <script>
        $('.btn-set-consumo').attr('ruta-consumo','{{ route("medidor/actualizar-consumo",["id" => $medidor->id]) }}');
        function setConsumo(idMedidor) {
            var consumo = $('#txt_consumo').val();
            var data = {
                id:idMedidor,
                consumo_m3:consumo
            }
            var url = $('.btn-set-consumo').attr('ruta-consumo');
            $.ajax({
                //headers: { 'X-CSRF-TOKEN' : '{ csrf_token() }}' },
                url: url,
                data: data,
                method:'GET'
                //cache:false
            })
                .done(function(result) {
                    console.log(result.respuesta);
                    if (result.respuesta === 'ok') {
                        window.location = result.redirect_url;
                        console.log(result.consumo);
                        showToast('Medidor',result.mensaje,'success');
                        $('#modal-medidor').modal('hide')
                    } else {
                        showToast('Error',result.respuesta,'warning');
                    }
                })
                .fail(function(data){
                    var errors = data.responseJSON;
                    showToast('Error','Intente nuevamente por favor.','warning');
                    console.log(errors);
                    $.each(errors.errors, function(index, value) {
                        $('#div-' + index).addClass('has-error');
                        $('#err-edt-' + index).html(value);
                    });
                });
        }
    </script>
@endpush