$(document).ready(function(){
$(".post-button").on("click", function(e){
    e.preventDefault();

    var form_data = $(this).searlize();

    $ajax({
        url:"public/survivor/post",
        method:"POST",
        data: form_data,
        dataType:"JSON",
        success:function(data){
            if(data.error != ' '){
                
            }
        }


    })
});
$(".reply").on("click", function(e){
    e.preventDefault();
       
 });
});
