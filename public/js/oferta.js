$(function(){

$('#publicar').submit(function(e){
   
    var route=$('#publicar').data('route');
    var form_data=$(this);

    $.ajax({
        type: 'PUT',
        url: route,
        data: form_data.serialize(),
        success: function(Response) {
            console.log(Response);


            if(Response.titulo) {
                $('#mismensajes').append('<p class="alert text-center">'+Response.titulo+'</p>');
            } else  if(Response.Provincia) {
                $('#mismensajes').append('<p class="alert text-center">'+Response.Provincia+'</p>');
            } else  if(Response.Experiencia) {
                $('#mismensajes').append('<p class="alert text-center">'+Response.Experiencia+'</p>');
            }else  if(Response.Salarioid) {
                $('#mismensajes').append('<p class="alert text-center">'+Response.Salarioid+'</p>');
            }else  if(Response.contrato) {
                $('#mismensajes').append('<p class="alert text-center">'+Response.contrato+'</p>');
            }else  if(Response.oferta) {
                $('#mismensajes').append('<p class="alert text-center">'+Response.oferta+'</p>');
            }else  if(Response.cat) {
                $('#mismensajes').append('<p class="alert text-center">'+Response.cat+'</p>');
            }
            
            else {
                $('#mismensajes').html('<p class="alert text-center">'+Response.success+'</p>');
                $( "#titulo" ).prop( "disabled", true );
                $( "#Provincia" ).prop( "disabled", true );
                $( "#Experiencia" ).prop( "disabled", true );
                $( "#Salarioid" ).prop( "disabled", true );
                $( "#contrato" ).prop( "disabled", true );
                $( "#oferta" ).prop( "disabled", true );
                $( "#cat" ).prop( "disabled", true )
                $(".fuera").remove();
            
             

            }



        }


    });



    e.preventDefault();
   
 
});

});