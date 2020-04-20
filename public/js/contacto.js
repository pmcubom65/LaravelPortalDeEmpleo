$(function(){

    $('#jumbotron').hide();
    $('#contactoform').submit(function(event){
        event.preventDefault();
        var route=$('#contactoform').data('route');
        var CSRF_TOKEN = $('input[name=_token]').val();
        var form_data=$(this);
        $.ajax({
            type: 'POST',
            url: route,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            
            data: form_data.serialize(),
            
            success : function(Response){
                console.log(Response);
                
                if (Response.dater){
                    $('#mensajes').append('<p class="alert">'+Response.dater+'</p>');
                }else  if (Response.horar){
                    $('#mensajes').append('<p class="alert">'+Response.horar+'</p>');
                }else if (Response.latr){
                    $('#mensajes').append('<p class="alert">'+Response.latr+'</p>');
                } else if (Response.longr){
                    $('#mensajes').append('<p class="alert">'+Response.longr+'</p>');
                }else if (Response.direccionr){
                    $('#mensajes').append('<p class="alert">'+Response.direccionr+'</p>');
                }
                
                else {
                    $('#mensajes').append('<p class="alert">'+Response.success+'</p>');
                    $('#contactar').prop('disabled', true);
                    $('#latr').prop('disabled', true);
                    $('#longr').prop('disabled', true);
                    $('#direccionr').prop('disabled', true);
                }

            },
            error: function( jqXHR, textStatus, errorThrown ) {
                $('#mensajes').append('<p class="alert">Error Sql, Candidato ya contactado</p>');
            }
        });


    });
});
