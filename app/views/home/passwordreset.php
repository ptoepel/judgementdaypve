<?php include('../app/views/inc/header.php'); ?>
<h1>Password Reset</h1>
<form  action="http://localhost/miscreated-dmg-log-dashboard/public/home/passwordReset" method="POST">
  <input type="hidden" name="validator" value="<?php echo $data['validator'] ?>"/>

  <input type="hidden" name="selector" value="<?php echo $data['selector'] ?>"/>

  <input type="password" name="password" placeholder="password" />

  <input type="password" name="repeatPassword" placeholder="repeat password" />

  <input type="submit" name="userPasswordReset" />

</form>
<?php include('../app/views/inc/footer.php'); ?>
