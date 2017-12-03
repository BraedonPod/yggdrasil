require('./bootstrap');
require('./ekko-lightbox');
require('./app2');

/* Comments and Replies */
$(document).on('click', '[data-toggle="reply"]', function(event) {
    $('#addcomment').html('<div><a href="#">@'+$(event.target).data('author')+'</a></div>');
    $('#replyid').val($(event.target).data('parent'));
});

try {
    var textarea = document.querySelector("#test");
    textarea.addEventListener("input", function(){
        if($(this).html() == "<br>") {
            $('#replyid').val("");
        }
    });
}
catch(err) {}

$("form").submit(function( event ) {
    $('#body').html($('#addcomment').html());
});



/* Status Fade */
$("#status").fadeOut(2000, function() { $(this).remove(); });

