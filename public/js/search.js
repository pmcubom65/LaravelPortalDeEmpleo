$(function(){
    
    $(document).on('click', function(e) {
        // clear all
        $('.card-body').css({
            backgroundColor: "",
            border: ""
        });
    
        // check the target and change the correct row
        if ($(e.target).hasClass('card-body')) {
            var id = $(e.target).attr('id');
           
            $('#' + id).css({
                backgroundColor: "black",
                
            });
            $('#ira').attr('href',"/search/"+id);

        }
    });





});