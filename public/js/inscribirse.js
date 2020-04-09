$(function(){
    
    $('#inscribirse').submit(function(e){
        var route=$('#inscribirse').data('route');
        var datos=$(this);
        $('.alert').remove;
        $.ajax({
            type: 'POST',
            url: route,
            data: datos.serialize(),
            success: function(Response) {
                console.log(Response);
                $('#mensajesinsc').append('<p class="alert  text-center">'+Response.success+'</p>');
                $(':input[type="submit"]').prop('disabled', true);
            },
            error: function(xhr, status, error) {
                
                $('#mensajesinsc').append('<p class="alert text-center">'+'Error de sql, ya se encuentra inscrito en esta oferta'+'</p>');
                $(':input[type="submit"]').prop('disabled', true);
              } 
        });


        e.preventDefault();
        

    });


});