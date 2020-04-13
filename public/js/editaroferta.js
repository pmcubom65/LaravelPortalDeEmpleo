$(function(){
    
$('#editar').submit(function(event) {
    var route=$('#editar').data('route');
    var form_data=$(this);
  
    $.ajax({
        type: 'POST',
        url: route,
        data: form_data.serialize(),
        success: function(Response) {
            console.log(Response);

            if(Response.titulo) {
                $('#mismensajes').html('<h3 class="alert text-center">'+Response.titulo+'</h3>');
            }else  if(Response.Provincia) {
                $('#mismensajes').html('<h3 class="alert text-center">'+Response.Provincia+'</h3>');
            }else  if(Response.Experiencia) {
                $('#mismensajes').html('<h3 class="alert text-center">'+Response.Experiencia+'</h3>');
            }else  if(Response.Salarioid) {
                $('#mismensajes').html('<h3 class="alert text-center">'+Response.Salarioid+'</h3>');
            }else  if(Response.contrato) {
                $('#mismensajes').html('<h3 class="alert text-center">'+Response.contrato+'</h3>');
            }else  if(Response.oferta) {
                $('#mismensajes').html('<h3 class="alert text-center">'+Response.oferta+'</h3>');
            }else  if(Response.cat) {
                $('#mismensajes').html('<h3 class="alert text-center">'+Response.cat+'</h3>');
            }else  if(Response.success) {
                $('#mismensajes').html('<h3 class="alert text-center">'+Response.success+'</h3>');
            }

       

        }
    });



    event.preventDefault();
}); 
 


});