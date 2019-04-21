$(document).ready(function(){
    $(".comment").hide();
    $(".reply-box").hide();

    $(".home-post").on("submit", function(e){

        e.preventDefault();

        /*var form_data = $(this).serialize();*/

        var data = $(this).serializeArray();
       

        $.post('http://localhost/miscreated-dmg-log-dashboard/public/survivor/post',{postBody: data[0]['value']}, function(data){
        if(data.length == 0) {
            //empty result
        } else {
            var content = $(data).find('.post-comment-container');
            $('.post-body').val('');
            $(".post-container").empty().append(content);
            $(".comment").hide();
            $(".reply-box").hide();
        }
        });


        /*create upload of photo */


        /* End the upload of photo */



        


    });

    $('.photo-upload').on('click', function(e){
        e.preventDefault();
        $('.pop-up-box').addClass('overlay');
        $('.pop-container').addClass('pop-up-container');
        $('.upload-photo').removeClass('hidden');
    });

    $('.close-pop-up-container').on('click',function(e){
        $('.pop-container').removeClass('pop-up-container');
        $('.pop-up-box').removeClass('overlay');
        $('.upload-photo').addClass('hidden');
    });



    $('.youtube-upload').on('click', function(e){
        e.preventDefault();
        $('.pop-up-box').addClass('overlay');
        $('.pop-container').addClass('pop-up-container');
        $('.upload-youtube').removeClass('hidden');
    });

    $('.close-pop-up-container').on('click',function(e){
        $('.pop-container').removeClass('pop-up-container');
        $('.pop-up-box').removeClass('overlay');
        $('.upload-youtube').addClass('hidden');
    });

    $('.reply').on('click', function(e){
        e.preventDefault();
        $(this).prev('.comment').toggle();
        $(this).prev('.reply-box').toggle();
    });




});