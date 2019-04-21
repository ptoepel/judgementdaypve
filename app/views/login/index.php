<?php include('../app/views/inc/header.php'); ?>
<main id="login">
<h1 class="lg-heading">Login</span></h1>
<h2 class="sm-heading">Our Custom Platform That Helps Our Community </h2>
<?php if(isset($data['flashErr']) && !empty($data['flashErr'])){ ?>
<div class="flashErr">
      <ul>
      <?php
          foreach($data['flashErr'] as $error){
            echo "<li>". $error ."</li>";
          }
        ?>
      </ul>
    </div>
    <div class="flashSuccess">
      <ul>
      <?php
        if(isset($data['flashSuccess']) && !empty($data['flashSuccess'])){
          foreach($data['flashSuccess'] as $success){
            echo "<li>". $success ."</li>";
          }
        }
        ?>
      </ul>
    </div>
<?php } ?>
<form class="login-form" action="<?php echo URL; ?>/public/login/userLogin" method="POST">
        <label>Your Email</label><input class="nav-item" name="email" type="email" />
        <label>Your Password</label><input class="nav-item" name="password" type="password" />
        <a href="<?php echo URL.'/public/login/reset'?>">Reset Password</a>
        <input class="nav-item" type="submit" name="userLogin" />
</form>


<form method="POST" action="<?php echo URL; ?>/public/login/registerUser">

<div class="instructions">Your 64 bit Steam ID can be found with this: </div>
<label>User Name</label>
<input placeholder="Username" name="userName" value="<?php if(isset($data['userName'])){ echo $data['userName']; } ?>"/>

<label>Password</label>
<input placeholder="Password" type="password" name="password" />

<label>Repeat Password</label>
<input placeholder="Repeat Password" type="password" name="repeatPassword" />

<label>Email</label>
<input placeholder="Email" name="email" value="<?php if(isset($data['email'])){ echo $data['email']; } ?>" />

<label>Steam ID</label>
<input placeholder="Steam ID" name="steamID" value="<?php if(isset($data['steamID'])){ echo $data['steamID']; }?>" />


<input type="submit" name="registerUser" placeholder="REGISTER" />
</form>


      </main>
<?php include('../app/views/inc/footer.php'); ?>
