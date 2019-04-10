$(document).ready(function(){
    $(".comment").hide();
    $(".reply-box").hide();

$(".home-post").on("submit", function(e){
    e.preventDefault();

    var form_data = $(this).serialize();

    $.post('http://localhost/miscreated-dmg-log-dashboard/public/survivor/post',{postBody:form_data}, function(data){
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
    /*
    .done(function ajaxDone(data){
        console.log(data);  
    })
    .fail(function ajaxFailed(e){
        console.log(e);
    })
    .always(function(data){
        console.log('Always');
    })*/
});




/*
$(".reply").on("click", function(e){
    e.preventDefault();
    $(this).prev('.comment').toggle();
    $(this).prev('.reply-box').toggle();
 });
*/


 $(".photo-upload").on("click", function(e){
    e.preventDefault();
    $('.pop-up-box').addClass("overlay");
    $('.pop-container').addClass("pop-up-container");


 });


 $('.close-pop-up-container').on('click',function(e){
    $('.pop-container').removeClass('pop-up-container');
    $('.pop-up-box').removeClass('overlay');
});


});
