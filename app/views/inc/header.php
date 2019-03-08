
<html>
<head>
<title>Miscreated Damage Logs</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php if($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] == "localhost/miscreated-dmg-log-dashboard/public/report/index"){    ?>
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />
<?php }else{ ?>
  <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/public/css/styles.css">
  <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/public/css/theme.css">
<link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
<?php } ?>

<script src="<?php echo URL; ?>/public/js/jquery.js"></script>




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
        <div class="portrait"></div>
      </div>
    	<ul class="menu-nav">
        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>/public/home/index">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>/public/about/index">About</a></li>
    	  <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>/public/blog/index">Blog</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>/public/contact/index">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>/public/login/index">Login</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>/public/login/register">Register</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>/public/login/reset">Reset</a></li>
        <?php if (isset($_SESSION['userName'])){ ?>
          <li class="nav-item"><a class="nav-link" href="<?php echo URL; ?>/public/home/logout">Logout</a></li>
        <?php } ?>
      </ul>
    </nav>
  </header>
  <div class="container">
