$(function() {


    $(document).on('click', '.like-post', function() {
        var post_id = $(this).data('post');
        var user_id = $(this).data('user');
        var counter = $(this).find('.likesCount');
        var count = counter.text();
        var anchor = $(this);

        $.post('http://http://localhost/miscreated-dmg-log-dashboard/public/survivor/like.php', { like: post_id, user_id: user_id }, function() {
            anchor.addClass('unlike-post');
            anchor.removeClass('like-post');
            count++;
            counter.text(count);
        });



    });
});