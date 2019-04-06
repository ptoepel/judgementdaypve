
<html>
<head>
<title>Miscreated Damage Logs</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script defer src="https://use.fontawesome.com/releases/v5.8.1/js/all.js" integrity="sha384-g5uSoOSBd7KkhAMlnQILrecXvzst9TdC09/VM+pjDTCM+1il8RHz5fKANTFFb+gQ" crossorigin="anonymous"></script>

<?php if($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] == "localhost/miscreated-dmg-log-dashboard/public/report/index"){    ?>
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />
<?php }else{ ?>
  <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/public/css/styles.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/public/css/theme.css">
<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">

<?php } ?>





</head>
<body>
  <header>

    <div class="menu-btn">
      <div class="btn-line"></div>
      <div class="btn-line"></div>
      <div class="btn-line"></div>
    </div>

    <nav class="menu">

      <div class="menu-branding">
      <h1>Judgement Day PVE</h1>
        <div class="portrait"><img src="http://localhost/miscreated-dmg-log-dashboard/public/css/images/Judgement-Day.jpg" /></div>
        <p>A Miscreated Community<span></span></p>
      </div>
    	<ul class="menu-nav">
        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>/public/home/index">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>/public/about/index">About</a></li>
    	  <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>/public/blog/index">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>/public/contact/index">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>/public/login/index">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>/public/login/register">Register</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>/public/login/reset">Reset</a></li>
      </ul>
    </nav>
  </header>
  <div class="container">
