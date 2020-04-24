$(function() {

  $('#empresaform').submit(function(e){

    var route=$('#empresaform').data('route');
    var form_data=$(this);
    $('.alert').remove;
    $('#messages').remove;
    $.ajax({
        type: 'POST',
        url: route,
        data: form_data.serialize(),
        success: function(Response){
            console.log(Response);

            if (Response.nombrer) {
                $('#messages').html('<h3 class="alert text-center">'+Response.nombrer+'</h3>');
            } else if (Response.apellidos) {
                $('#messages').html('<h3 class="alert text-center">'+Response.apellidos+'</h3>');
            }else if (Response.direccion) {
                $('#messages').html('<h3 class="alert text-center">'+Response.direccion+'</h3>');
            }else if (Response.num) {
                $('#messages').html('<h3 class="alert text-center">'+Response.num+'</h3>');
            }else if (Response.Provincia) {
                $('#messages').html('<h3 class="alert text-center">'+Response.Provincia+'</h3>');
            }else if (Response.telefono) {
                $('#messages').html('<h3 class="alert text-center">'+Response.telefono+'</h3>');
            } else if (Response.cif) {
                $('#messages').html('<h3 class="alert text-center">'+Response.cif+'</h3>');
            }else if (Response.latitud) {
                $('#messages').html('<h3 class="alert text-center">'+Response.latitud+'</h3>');
            }else if (Response.longitud) {
                $('#messages').html('<h3 class="alert text-center">'+Response.longitud+'</h3>');
            }else {
                
                    $('#messages').append('<h3 class="alert text-center">'+Response.success+'</h3>');

                    setTimeout(function(){  }, 4000);
                    location.reload();
            }
           
        }

    });

    e.preventDefault();


  });




});