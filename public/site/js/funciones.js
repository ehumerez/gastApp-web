
$( document ).ready(function() {
    console.log( "ready functions!" );
});

$(function () {
    $('#btn-crear-cliente').click(function (e) {
        $('.validate-cliente').removeClass('has-error');
        $('.err-div').html('');
        e.preventDefault();

        var data = $('#frm-data-store-cliente').serialize();
        var url2 = $('#frm-data-store-cliente').attr('action');
        $.ajax({
            //headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
            url: url2,
            data: data,
            method:'POST'
            //cache:false
        })
            .done(function(result) {
            console.log(result.respuesta);
                if (result.respuesta === 'ok') {
                    //alert("Registro exitoso");
                    window.location = result.redirect_url;
                } else {
                    showToast('Error',result.respuesta,'warning');
                }
            })
            .fail(function(data){
                var errors = data.responseJSON;
                showToast('Error','Intente nuevamente por favor.','warning');
                $.each(errors.errors, function(index, value) {
                    $('#div-' + index).addClass('has-error');
                    $('#err-edt-' + index).html(value);
                });
            });
    });

    $('#btn-crear-lecturador').click(function (e) {
        $('.validate-lecturador').removeClass('has-error');
        $('.err-div').html('');
        e.preventDefault();

        var data = $('#frm-data-store-lecturador').serialize();
        var url2 = $('#frm-data-store-lecturador').attr('action');
        $.ajax({
            //headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
            url: url2,
            data: data,
            method:'POST'
            //cache:false
        })
            .done(function(result) {
                console.log(result.respuesta);
                if (result.respuesta === 'ok') {
                    //alert("Registro exitoso");
                    window.location = result.redirect_url;
                } else {
                    showToast('Error',result.respuesta,'warning');
                }
            })
            .fail(function(data){
                var errors = data.responseJSON;
                showToast('Error','Intente nuevamente por favor.','warning');
                $.each(errors.errors, function(index, value) {
                    $('#div-' + index).addClass('has-error');
                    $('#err-edt-' + index).html(value);
                });
            });
    });

    $('#btn-crear-tecnico').click(function (e) {
        $('.validate-tecnico').removeClass('has-error');
        $('.err-div').html('');
        e.preventDefault();

        var data = $('#frm-data-store-tecnico').serialize();
        var url2 = $('#frm-data-store-tecnico').attr('action');
        $.ajax({
            //headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
            url: url2,
            data: data,
            method:'POST'
            //cache:false
        })
            .done(function(result) {
                console.log(result.respuesta);
                if (result.respuesta === 'ok') {
                    //alert("Registro exitoso");
                    window.location = result.redirect_url;
                } else {
                    showToast('Atención',result.respuesta,'warning');
                }
            })
            .fail(function(data){
                var errors = data.responseJSON;
                showToast('Atención','Complete los campos por favor.','warning');
                $.each(errors.errors, function(index, value) {
                    $('#div-' + index).addClass('has-error');
                    $('#err-edt-' + index).html(value);
                });
            });
    });
});


function crearMedidor() {
    var data = $('#frm-data-medidores').closest('form').serialize();
    var urlc = '';
    $.ajax({
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
        url: '{{ route("medidor/store") }}',
        method: POST,
        data: data,
        success: function (data) {
            if (data.respuesta == 'ok') {
                showToast("Medidor", data.message, "success");
            }

        },
        error: function (data) {
            var errors = data.responseJSON;
            console.log(data.responseText);
        }
    });
}

/*function setConsumo(id) {
    //var data = $('#frm-set-consumo-medidor').serialize();
    var url = $('.btn-set-consumo').attr('ruta-consumo') +'' +id;
    $.ajax({
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
        url: url,
        method: 'GET',
        data: {idMedidor: id},
        success: function (data) {
            if (data.respuesta == 'ok') {
                //showToast("Medidor", data.message, "success");
                console.log(data.message);
                console.log(data.id);
            }

        },
        error: function (data) {
            var errors = data.responseJSON;
            console.log(data.responseText);
        }
    });
}*/

function showToast(titulo,mensaje,tipo) {
    Command: toastr[tipo](mensaje, titulo)

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": false,
        "preventDuplicates": true,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "400",
        "hideDuration": "1000",
        "timeOut": "2000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
}