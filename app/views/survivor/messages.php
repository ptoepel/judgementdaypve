<?php include('../app/views/inc/admin.header.php'); ?>
<main id="survivor-messages">

	
<div class="grid">
  <div class="grid__item grid__item--md-span-4">

  </div>
  <div class="grid__item grid__item--md-span-4">
Search Users
<form class="user-search" action="<?php echo URL; ?>/public/survivor/search" method="GET">

<input type="text" class="search" name="userSearch" />
<div class="search-result">
<?php

if(isset($data['search']) && !empty($data['search'])){
  echo"<ul>";
  foreach($data['search'] as $userStuff){
  echo"<li><a href='".URL ."/public/survivor/user/". $userStuff['id'] ."' a>". $userStuff['userName']."</a></li>";
  }
  echo "</ul>";
}
?>
</div>


</form>

  </div>
  <div class="grid__item grid__item--md-span-4">

  </div>

</div>

<div class="grid">
  <div class="grid__item grid__item--md-span-4">
   

  </div>
  <div class="grid__item grid__item--md-span-4">

  </div>
  <div class="grid__item grid__item--md-span-4">

  </div>
</div>

<div class="grid">
  <div class="grid__item grid__item--md-span-4">

  </div>
  <div class="grid__item grid__item--md-span-4">
  
  </div>
  <div class="grid__item grid__item--md-span-4">
  
  </div>
</div>
</main>
<div class="grid">
  <div class="grid__item grid__item--md-span-12">


  </div>
</div>

<?php include('../app/views/inc/admin.footer.php'); ?>
