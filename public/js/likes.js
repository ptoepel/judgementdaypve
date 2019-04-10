$(function(){


    $(document).on('click', '.like-btn',function(){
        var post_id = $(this).data('post');
        var user_id = $(this).data('user');
        var total = $(this).find('.likesTotal');
        var button = $(this);

    });
});