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
                    $('#mismensajes').append('<p>'+Response.catname+'</p>');
                } else  if(Response.desccat) {
                    $('#mismensajes').append('<p class="alert">'+Response.desccat+'</p>');
                } else {
                    $('#mismensajes').append('<p class="alert">'+Response.success['mssg']+'</p>');
                    $('#cat').append('<option value="'+Response.success['elid']+'">'+Response.success['elname']+'</option>');


                    
                }
            }
        });


        e.preventDefault();
    });
});