<?php include('../app/views/inc/header.php'); ?>

<h1>Apply</h1>
<section>
  <article>
    <h2>Welcome</h2>
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
  <form method="POST" action="customerapply">

    <div class="instructions">Your 64 bit Steam ID can be found with this: </div>
    <label>Steam ID<label>
    <input placeholder="Steam ID" name="steamID">
    <label>User Name<label>
    <input placeholder="Username" name="userName">
    <label>Email<label>
    <input placeholder="Email" name="email">

    <input type="submit" placeholder="submit">
  </form>
</section>


<?php include('../app/views/inc/footer.php'); ?>
