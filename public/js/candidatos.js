$(function(){

    $('#postseleccionado').submit(function(event){
        var route=$('#postseleccionado').data('route');
        var form_data=$(this);
    
        $.ajax({
            type: 'POST',
            url: route,
            data: form_data.serialize(),
            success: function(Response) {
                $("#sele").remove();
                $("#deco").remove();
                $('#mismensajes').append('<p class="alert">'+'El trabajador ha sido marcado como seleccionado'+'</p>');
                $('#seleccionados').append($('#t'+Response.success).html());
      
                $('#t'+Response.success).css("display", "none");
 
              
              
              
            }
        });
    
        event.preventDefault();
    });


$('#putdescartado').submit(function(event){
    var route=$('#putdescartado').data('route');
    var form_data=$(this);

    $.ajax({
        type: 'PUT',
        url: route,
        data: form_data.serialize(),
        success: function(Response) {
            $("#deco").remove();
            $("#sele").remove();

            $('#mismensajes').append('<p class="alert">'+'El trabajador ha sido marcado como descartado'+'</p>');
            $('#descartados').append($('#t'+Response.success).html());
      
            $('#t'+Response.success).css("display", "none");
       
           
            
        }
    });
    event.preventDefault();
});

});