$(document).ready(function(){

    $(".comment").hide();
    $(".reply-box").hide();

$(".post-button").on("click", function(e){
    e.preventDefault();

    var form_data = $(this).serialize();

    $.ajax({
        url:"public/survivor/post",
        method:"POST",
        data: form_data,
        dataType:"JSON",
        async:true,
    })
    .done(function ajaxDone($data){
        console.log(data);  
    })
    .fail(function ajaxFailed(e){
        console.log(e);
    })
    .always(function(data){
        console.log('Always');
    })
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
