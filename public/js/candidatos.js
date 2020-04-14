$(function(){

$('#postseleccionado').submit(function(event){
    var route=$('#postseleccionado').data('route');
    var form_data=$(this);

    $.ajax({
        type: 'POST',
        url: route,
        data: form_data.serialize(),
        success: function(Response) {
            console.log(Response);
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
            console.log(Response);
        }
    });
    event.preventDefault();
});

});