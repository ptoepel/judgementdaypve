<?php include('../app/views/inc/header.php'); ?>
<main id="register">
<section>
  <article>
  <h1 class="lg-heading">Register</span></h1>
<h2 class="sm-heading"> Register For Our Site. This will get you Whitelisted.</h2>
  </article>
  <section class="errors">
    <?php
    if(isset($data['errors'])){
      echo"<ul>";
      foreach($data['errors'] as $error){
        echo "<li>". $error . "</li>";
      }
      echo "</ul>";
    }
     ?>
  </section>
  <form method="POST" action="registerUser">

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
</section>


<?php include('../app/views/inc/footer.php'); ?>
