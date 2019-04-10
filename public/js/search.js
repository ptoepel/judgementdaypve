$(function(){
    $('.search').keyup(function(){
       var search = $(this).val();
       $.post('http://localhost/miscreated-dmg-log-dashboard/public/survivor/search',{search:search},function(data){
        var content = $(data).find('.search-result');
        $(".search-result").empty().append(content);
       });
    });
});