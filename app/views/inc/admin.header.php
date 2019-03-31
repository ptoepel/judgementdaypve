
<html>
<head>
<title>Miscreated Damage Logs</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php if($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] == "localhost/miscreated-dmg-log-dashboard/public/report/index"){    ?>

  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="http://localhost/miscreated-dmg-log-dashboard/public/css/table.css">

<?php }else{ ?>
  <link rel="stylesheet" type="text/css" href="http://localhost/miscreated-dmg-log-dashboard/public/css/styles.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/miscreated-dmg-log-dashboard/public/css/survivor-theme.css">
<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
<?php } ?>


<script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
  crossorigin="anonymous"></script>
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
$(document).ready(function() {
  $('.mobile').click(function () {
	  $('nav').toggleClass('active'); 
   });
  
   $('nav ul li ul').each(function() {
    $(this).before('<span class=\"arrow\"></span>');
  });
  
  $('nav ul li').click(function() {
    $(this).children('ul').toggleClass('active');
     $(this).children('.arrow').toggleClass('rotate');
  });
});
</script>

</head>
<body>
  <header>
  <a class="mobile" href="#">&#9776;</a>
<nav>
  <ul>
    
    <li><a href="#">Home</a></li>
    <li>
        <a href="#">About</a>
        <ul>
            <li><a href="#">Survivors</a></li>
            <li><a href="#">Discord</a></li>
            <li><a href="#">Admins</a></li>
            <li><a href="#">Bases</a></li>
            <li><a href="#">Rules</a></li>
            <li><a href="#">Story</a></li>
            <li><a href="#">Factions</a></li>
        </ul>
    </li>
    <li><a href="#">Blog</a></li>
    <li><a href="#">Data</a>
    <ul>
            <li><a href="#">Top 5</a></li>
            <li><a href="#">Raw Data</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Archived</a></li>
        </ul></li>
    <li><a href="#">Social</a></li>
    <li><a href="#">Messages</a></li>
  </ul>
  <div style="clear:both;"></div>
</nav>
  </header>
<div class="container">
