<?php include('../app/views/inc/admin.header.php'); ?>
<main id="survivor-report">
  <div class="grid">
      <div class="grid__item grid__item--md-span-12">
      <h4>Raw Data</h4>
        <?php
          echo $data['data'];
        ?>
      </div>
  </div>
</main>
<?php include('../app/views/inc/admin.footer.php'); ?>
