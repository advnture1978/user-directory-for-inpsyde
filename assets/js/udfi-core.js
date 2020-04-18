/*-----------------------------
* Build Your Plugin JS / jQuery
-----------------------------*/
/*
Jquery Ready!
*/
jQuery(document).ready(function($){
    "use strict";
    /*
    Add basic front-end page scripts here
    */
    $(".udfi_link").click(function(){
        var data = {
            'action': 'udfi_get_user_details',
            'id':   $(this).data('id'),
        };
        $("#udfiModal").modal('hide');
        $.get(udfi_ajaxurl, data, function(response){
        	$("#udfiModal .modal-title").html(response.name);
            $("#udfiModal .modal-body").html(response.html);
            $('#udfiModal').modal('show');
        });
    })
    
    // End basic front-end scripts here
});