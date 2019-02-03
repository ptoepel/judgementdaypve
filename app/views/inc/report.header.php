
<html>
<head>
<title>Miscreated Damage Logs</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--JQUERY-->
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<!-- Report Page Stuff -->
<?php if($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] == "localhost/miscreated-dmg-log-dashboard/public/report/index"){    ?>
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="http://localhost/miscreated-dmg-log-dashboard/public/css/table.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<?php }else{ ?>
  <link rel="stylesheet" type="text/css" href="http://localhost/miscreated-dmg-log-dashboard/public/css/styles.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/miscreated-dmg-log-dashboard/public/css/theme.css">
  <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
<?php } ?>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$("#menu").on("click", function(){
   $("#menu").css("opacity", "0");
    $("#lgMenu").addClass("enter");
});
    $("#exit").on("click", function(){
       $("#lgMenu").removeClass("enter");
        $("#menu").css("opacity", "1");
    });
});
</script>
<script>

$(document).ready( function() {
  $('.sub > a').click( function() {
    $('.sub').find('.current').removeClass('current');
    $(this).addClass('current');
  });
  $('aside > a').click( function() {
    $('aside').find('.current').removeClass('current');
    $(this).addClass('current');
  });
  $('.ntfy i').click( function() {
    $(this).parent().toggleClass('gt').toggleClass('active');
  });

  var x = $('aside').width();
  var margin = '50px 0 0 '+ x +'px';
  var width = $(window).width() - x;
  $('#main').css({
    margin: margin,
    width: width
  });

  $(window).resize(function() {
    var x = $('aside').width();
    var margin = '50px 0 0 '+ x +'px';
    var width = $(window).width() - x;
    $('#main').css({
      margin: margin,
      width: width
    });
  });
});

</script>

<script>
$(document).ready(function() {
    $('#example').DataTable();
} );

</script>

</head>
<body>

<div class="container">
