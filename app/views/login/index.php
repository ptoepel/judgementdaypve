<?php include('../app/views/inc/header.php'); ?>
<main id="login">
<h1 class="lg-heading">Login</span></h1>
<h2 class="sm-heading">Our Custom Platform That Helps Our Community </h2>
<?php if(isset($data['flashErr'])){ ?>
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
<?php } ?>
<form class="login-form" action="<?php echo URL; ?>/public/login/userLogin" method="POST">
        <input class="nav-item" name="email" type="email" />
        <input class="nav-item" name="password" type="password" />
        <input class="nav-item" type="submit" name="userLogin" />
</form>
      </main>
<?php include('../app/views/inc/footer.php'); ?>
