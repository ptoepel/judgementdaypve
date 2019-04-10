$(function(){

    var regex = /[#|@](\w+)$/ig;
    $(document).on('keyup', '.postBody',function(){
        var content = $.trim($(this).val());
        var text = content.match(regex);
        var max = 255;
        if(text !=null){
            var dataString = 'hashtag='+text;
            $.ajax({
                type:"POST",
                url:"http://localhost",
                cache:false,
                success:function(data){
                $('.hash-box ul').html(data);
                }
            })
        }
    })
});