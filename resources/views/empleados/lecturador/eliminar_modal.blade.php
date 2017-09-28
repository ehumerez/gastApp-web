<div class="modal inmodal" id="eliminar-lecturador-{{ $lecturador->ci }}" tabindex="-1" role="dialog" aria-hidden="true">
    {!! Form::open(['route' => ['lecturador/eliminar','ci'=> $lecturador->ci], 'method' => 'get']) !!}
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <h4 class="modal-title">Eliminar Lecturador</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <p>¿Está seguro de eliminar al lecturador {{ $lecturador->nombres }} {{ $lecturador->apellido_paterno }} {{ $lecturador->apellido_materno }}?</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>