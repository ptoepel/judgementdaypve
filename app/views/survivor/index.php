<?php include('../app/views/inc/admin.header.php'); ?>
<main id="survivor-home">

	
<div class="grid">
  <div class="grid__item grid__item--md-span-4">
    xs-4
  </div>
  <div class="grid__item grid__item--md-span-4">
    xs-4
  </div>
  <div class="grid__item grid__item--md-span-4">
    xs-4
  </div>

</div>

<div class="grid">
  <div class="grid__item grid__item--md-span-4">
    md-4
  </div>
  <div class="grid__item grid__item--md-span-4">
  <form class="home-post" action="<?php echo URL; ?>/public/survivor/post" method="POST">
    <textarea name="postBody" style=" width: 300px;
  height: 100px;"></textarea>
  
    <button type="submit" value="postHomePage"><i class="fas fa-paper-plane"></i> POST</button>
    </form>
  </div>
  <div class="grid__item grid__item--md-span-4">
    md-4
  </div>
</div>

<div class="grid">
  <div class="grid__item grid__item--sm-span-1">
    sm-1
  </div>
  <div class="grid__item grid__item--sm-span-1">
    sm-1
  </div>
  <div class="grid__item grid__item--sm-span-1">
    sm-1
  </div>
  <div class="grid__item grid__item--sm-span-1">
    sm-1
  </div>
  <div class="grid__item grid__item--sm-span-1">
    sm-1
  </div>
  <div class="grid__item grid__item--sm-span-1">
    sm-1
  </div>
  <div class="grid__item grid__item--sm-span-1">
    sm-1
  </div>
  <div class="grid__item grid__item--sm-span-1">
    sm-1
  </div>
  <div class="grid__item grid__item--sm-span-1">
    sm-1
  </div>
  <div class="grid__item grid__item--sm-span-1">
    sm-1
  </div>
  <div class="grid__item grid__item--sm-span-1">
    sm-1
  </div>
  <div class="grid__item grid__item--sm-span-1">
    sm-1
  </div>
</div>
</main>
<?php include('../app/views/inc/admin.footer.php'); ?>
