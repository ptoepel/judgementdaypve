<?php include('../app/views/inc/header.php'); ?>
<main id="reset">
<h1>Reset Password</h1>
<section>

<form action="http://localhost/miscreated-dmg-log-dashboard/public/home/userReset" method="POST">
  <input type="email" name="email"/>
  <input type="submit" name="userReset" />
</form>


</section>
</main>
<?php include('../app/views/inc/footer.php'); ?>
