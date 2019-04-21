$(function(){
    var regex = /[#|@](\w+)$/ig;
    $(document).on('keyup', '.post-body',function(){
        var content = $.trim($(this).val());
        var text = content.match(regex);
        var max = 255;

        if(text != null){
            if(text.substring(0,1) === '@'){
            var dataString = 'mention='+ text;
            $.ajax({
                type:"POST",
                url:"http://localhost/miscreated-dmg-log-dashboard/public/survivor/mention",
                data: dataString,
                cache:false,
                success:function(data){
                    var content = $(data).find('.hash-box ul');
                    $(".hash-box ul").empty().append(content);
                    $('.hash-box li').click(function(){
                        var value = $.trim($(this).find('.simpleValue').text());
                        var oldContent = $('.post-body').val();
                        var newContent = oldContent.replace(regex,"");
                        $('.post-body').empty();

                        $('.post-body').val(newContent + value + ' ');
                        $('.hash-box li').hide();
                        $('.post-body').focus();
                    });
  
                }
            });
        }
    }
    });
});