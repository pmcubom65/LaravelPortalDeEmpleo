$(function(){



    $('#contactarid').submit(function(e){
        var route=$('#contactarid').data('route');
        var form_data=$(this);
        $.ajax({
            type: 'POST',
            url: route,
            data: form_data.serialize(),
            success : function(Response) {
                console.log(Response);
                if(Response.asuntoid) {
                    $('#informar').append('<p class="alert">'+Response.asuntoid+'</p>');
                   
                }else  if(Response.mssgid) {
                    $('#informar').append('<p class="alert">'+Response.mssgid+'</p>');
                
                }else  if(Response.emailid) {
                    $('#informar').append('<p class="alert">'+Response.emailid+'</p>');
                    
                }else {
                    $('#informar').append('<p class="alert">'+Response.success+'</p>');
                }
               
            }
        });

        e.preventDefault();
    });
});