$(function(){

    $('#jumbotron').hide();
    $('#contactoform').submit(function(event){
        event.preventDefault();
        var route=$('#contactoform').data('route');
        var form_data=$(this);
        $.ajax({
            type: 'POST',
            url: route,
            data: form_data.serialize(),
            success : function(Response){
                console.log(Response);

            }
        });


    });
});