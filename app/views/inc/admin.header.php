
<html>
<head>
<title>Miscreated Damage Logs</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>



<?php if($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] == "localhost/miscreated-dmg-log-dashboard/public/report/index"){    ?>

  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="http://localhost/miscreated-dmg-log-dashboard/public/css/table.css">

<?php }else{ ?>
  <link rel="stylesheet" type="text/css" href="http://localhost/miscreated-dmg-log-dashboard/public/css/styles.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/miscreated-dmg-log-dashboard/public/css/survivor-theme.css">
<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Heebo:300" rel="stylesheet">
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
    
    <li><a href="<?php echo URL; ?>/public/survivor/index"><i class="fas fa-home"></i> Home</a></li>
    <li>
        <a href="<?php echo URL; ?>/public/survivor/about"><i class="fas fa-address-card"></i> About</a>
        <ul>
            <li><a href="<?php echo URL; ?>/public/survivor/users"><i class="fas fa-address-card"></i> Survivors</a></li>
            <li><a href="<?php echo URL; ?>/public/survivor/discord"><i class="fab fa-discord"></i> Discord</a></li>
            <li><a href="<?php echo URL; ?>/public/survivor/staff"><i class="fab fa-discord"></i>Staff</a></li>
            <li><a href="<?php echo URL; ?>/public/survivor/bases"><i class="fab fa-discord"></i> Bases</a></li>
            <li><a href="<?php echo URL; ?>/public/survivor/Rules"><i class="fas fa-ruler-vertical"></i> Rules</a></li>
            <li><a href="<?php echo URL; ?>/public/survivor/story"><i class="fas fa-book"></i> Story</a></li>
            <li><a href="<?php echo URL; ?>/public/survivor/factions"><i class="fas fa-user-friends"></i> Factions</a></li>
        </ul>
    </li>
    <li><a href="<?php echo URL; ?>/public/survivor/blog"><i class="fas fa-newspaper"></i> Blog</a></li>
    <li><a href="<?php echo URL; ?>/public/survivor/data"><i class="fas fa-user-friends"></i> Data</a>
    <ul>
            <li><a href="<?php echo URL; ?>/public/survivor/topfive"><i class="fab fa-500px"></i> Top 5</a></li>
            <li><a href="<?php echo URL; ?>/public/survivor/raw"><i class="fas fa-scroll"></i>Raw Data</a></li>
            <li><a href="<?php echo URL; ?>/public/survivor/archived">Archived</a></li>
        </ul></li>
    <li><a href="<?php echo URL; ?>/public/survivor/social"><i class="fas fa-share"></i>Social</a></li>
    <li><a href="<?php echo URL; ?>/public/survivor/messages"><i class="fas fa-share"></i> Messages</a></li>
  </ul>
  <div style="float:right;">
  <ul>
  <li><a href="<?php print URL . '/public/login/logout'; ?>"><i class="fas fa-contact"></i> Logout</a></li>
  </ul>
  </ul>
  </div>
  <div style="clear:both;"></div>

</nav>
  </header>
<div class="container">
