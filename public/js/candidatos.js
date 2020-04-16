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

$(document).on('click','.pagination a', function(e){
    e.preventDefault();
   
    
    var page = $(this).attr('href').split('page=')[1];
    // getProducts(page);
   // location.hash = page;

    console.log($(this).attr('href'));
      e.stopPropagation();
    getPaginas(page);
 
});

function getPaginas(page){
    var route=$('#putdescartado').data('route');
    var trabajadorid=$('#seleccionado').val();
    var $midiv=$('#poneraqui');
    
    $midiv.html('');
    console.log(route+'/'+trabajadorid+'?page=' + page);
    
    $.ajax({
        url: route+'/'+trabajadorid+'?page=' + page,
        dataType: 'json',
    }).done(function(Response){
      
        var stringsalida='';
       
      $.each(Response.experiencias.data, function(index, objeto){
        

        stringsalida=stringsalida+index+'<h5 class="font-weight-bold card-title">'+objeto.puesto+'</h5><p><span class="font-weight-bold">Empresa:</span>'+objeto.empresa+'</p><p><span class="font-weight-bold">Descripción:</span>'+objeto.descripcion+'</p><p><span class="font-weight-bold">Inicio: </span>'+objeto.inicio+'</p><p><span class="font-weight-bold">Fin: </span>'+objeto.fin+'</p><hr>';
        console.log(stringsalida);
    });
   
    $midiv.prepend(stringsalida);
 
 
    
  

});

}



});

