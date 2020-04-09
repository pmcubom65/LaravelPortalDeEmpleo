$(function() {
    $('#categoria-data').submit(function(e){

        var route=$('#categoria-data').data('route');
        var categoria_data=$(this);
        $('.alert').remove();
        $.ajax({
            type:'POST',
            url: route,
            data: categoria_data.serialize(),
            success: function(Response) {
                console.log(Response);

                if(Response.catname) {
                    $('#mismensajes2').append('<p class="alert">'+Response.catname+'</p>');
                } else  if(Response.desccat) {
                    $('#mismensajes2').append('<p class="alert">'+Response.desccat+'</p>');
                } else {
                    $('#mismensajes2').append('<p class="alert">'+Response.success['mssg']+'</p>');
                    $( "#catname" ).prop( "disabled", true );
                    $( "#desccat" ).prop( "disabled", true );
                    $("#botoncat").remove();
                    $('#cat').append('<option value="'+Response.success['elid']+'">'+Response.success['elname']+'</option>');
 
                }
            },
            error: function(xhr, status, error) {
                
                $('#mismensajes2').append('<p class="alert">'+'Error de sql, esa categoría ya debe de existir'+'</p>');
              } 
        });


        e.preventDefault();
    });
});