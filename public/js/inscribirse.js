$(function(){
    
    $('#inscribirse').submit(function(e){
        var route=$('#inscribirse').data('route');
        var datos=$(this);
        var user_id = $('input[name=usu]').val();
        var CSRF_TOKEN = $('input[name=_token]').val();

        $('.alert').remove;
        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: route,
          
            data: { user_id: user_id,  _token: $("meta[name='csrf-token']").attr("content") },
           cache: true,
            success: function(Response) {
                console.log(Response);
                $('#mensajesinsc').append('<p class="alert  text-center">'+Response.success+'</p>');
                $(':input[type="submit"]').prop('disabled', true);
            },
            error: function(xhr, status, error) {
                
                $('#mensajesinsc').append('<p class="alert text-center">'+'Ya esas inscrito en la oferta'+'</p>');
                $(':input[type="submit"]').prop('disabled', status);
              } 

       
        });


        e.preventDefault();
        
    });
 


});