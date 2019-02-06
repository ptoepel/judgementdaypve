
<html>
<head>
<title>Miscreated Damage Logs</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php if($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] == "localhost/miscreated-dmg-log-dashboard/public/report/index"){    ?>

  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="http://localhost/miscreated-dmg-log-dashboard/public/css/table.css">

<?php }else{ ?>
  <link rel="stylesheet" type="text/css" href="http://localhost/miscreated-dmg-log-dashboard/public/css/styles.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/miscreated-dmg-log-dashboard/public/css/theme.css">
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
/*
$(document).ready(function()){
$('email').keyup(function(){
    var email = $("email").val();\
    $.post("home/userLogin");
});
});
*/
</script>

</head>
<body>
  <header>
    <h1>Survivor Pages</h1>
    <div id="menu">|||</div>
    <div id="lgMenu">
      <span id="exit">&times;</span>
    	<ul>

    	<li><a href="http://localhost/miscreated-dmg-log-dashboard/public/home/index">Home</a></li>
    	<li><a href="http://localhost/miscreated-dmg-log-dashboard/public/blog/index" >Blog</a></li>
    	<li><a href="http://localhost/miscreated-dmg-log-dashboard/public/report/index" >Reports</a></li>


      </ul>
    </div>
    <div class="flashErr">
      <ul>
      <?php
        if(isset($data['flashErr'])){
          foreach($data['flashErr'] as $error){
            echo "<li>". $error ."</li>";
          }
        }
      ?>
      </ul>
    </div>
    <form action="http://localhost/miscreated-dmg-log-dashboard/public/home/userLogin" method="POST">
      <input class="" name="email"/>
      <input class="" name="password" type="password"/>
      <input class="" type="submit" name="userLogin">
    </form>

    <a href="http://localhost/miscreated-dmg-log-dashboard/public/home/register">Register</a>
    <?php if (isset($_SESSION['userName'])){ ?>
      <a href="http://localhost/miscreated-dmg-log-dashboard/public/home/logout">Logout</a>
    <?php } ?>
  </header>
<div class="container">
