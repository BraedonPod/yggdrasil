require('./bootstrap');
require('./ekko-lightbox');

/* Light Box */
$(document).on('click', '[data-toggle="library-status"]', function(event) {
    library($(event.target));
});

/* Library Functions */
function library(e)
{
    axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    axios({
        method: 'post',
        url: '/library',
        data: {
            status: e.val(),
            userid: document.getElementById('user_id').value,
            sourceid: document.getElementById('source_id').value,
            sourcetype: document.getElementById('source_type').value
        }
    }).then(function (response) {
        console.log(response.data);
    }).catch(function (error) {
        console.log(error);
    });
}

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

