
<html>
<head>
<title>Miscreated Damage Logs</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="http://localhost/miscreated-dmg-log-dashboard/public/css/styles.css">
<link rel="stylesheet" type="text/css" href="http://localhost/miscreated-dmg-log-dashboard/public/css/theme.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet"> <!-- Google Font Styling-->
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
</head>
<body>
  <header>
    <h1>Judgement Day PVE</h1>
    <div id="menu">|||</div>
    <div id="lgMenu">
      <span id="exit">&times;</span>
    	<ul>
      <?php if($data['userType'] == "customer"){?>
    	<li><a href="http://localhost/miscreated-dmg-log-dashboard/public/home/index">Home</a></li>
    	<li><a href="http://localhost/miscreated-dmg-log-dashboard/public/blog/index" >Blog</a></li>
    	<li><a href="http://localhost/miscreated-dmg-log-dashboard/public/report/index" >Reports</a></li>
      <li><a href="http://localhost/miscreated-dmg-log-dashboard/public/contact/index" >Contact</a></li>
    <?php }else{?>
      <li><a href="http://localhost/miscreated-dmg-log-dashboard/public/home/index">Home</a></li>
      <li><a href="http://localhost/miscreated-dmg-log-dashboard/public/blog/index" >Blog</a></li>
      <li><a href="http://localhost/miscreated-dmg-log-dashboard/public/apply/index" >Apply</a></li>
      <li><a href="http://localhost/miscreated-dmg-log-dashboard/public/login/index">Login</a></li>
    <?php } ?>
      </ul>

    </div>

  </header>
<div class="container">
