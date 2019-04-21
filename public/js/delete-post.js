$(function(){


    $(document).on('click', '.delete-post',function(e){
        e.preventDefault();
        var post_id = $(this).data('postID');

        $.post('http://localhost/miscreated-dmg-log-dashboard/public/survivor/delete_post',{deletePost:form_data}, function(data){
            if(data.length == 0) {
                //empty result
              } else {
        
        
                var content = $(data).find('.post-comment-container');
                $(".post-container").empty().append(content);
                $(".comment").hide();
                $(".reply-box").hide();
               /* $('.post').html(data); */
             }
        });
    });
});