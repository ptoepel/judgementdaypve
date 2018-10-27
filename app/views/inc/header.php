
<html>
<head>
<title>Miscreated Damage Logs</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../../css/styles.css">
<link rel="stylesheet" type="text/css" href="../../css/theme.css">
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
<div class="container">
<div id="menu">|||</div>
<div id="lgMenu">
  <span id="exit">&times;</span>
	<ul>
	<li><a href="home/index">Home</a></li>
	<li><a href="/blog/index" >Blog</a></li>
	<li><a href="/report/rawdata" >Raw Data</a></li>
	<li><a href="/report/killsbyplayer">Most Kills</a></li>
	<li><a href="/registration/index" >Form</a></li>
	</ul>
	<iframe src="https://www.i3d.net/gameserver-widget/806741/d6fd920ec9c1fcc85a93918faee6b052070fea6a/1"></iframe>

</div>
