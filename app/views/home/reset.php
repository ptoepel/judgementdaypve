<?php include('../app/views/inc/header.php'); ?>
<h1>Reset Password</h1>
<section>

<form action="/userReset" method="POST">
  <input type="email" name="email"/>
  <input type="submit" name="userReset" />
</form>


</section>
<?php include('../app/views/inc/footer.php'); ?>
