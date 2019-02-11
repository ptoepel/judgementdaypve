<?php include('../app/views/inc/header.php'); ?>
<main id="contact">

<h1 class="lg-heading">
Contact
    <span class="text-secondary">Judgement Day PVE</span>
</h1>
<h2 class="sm-heading">
    Have a question for us?
</h2>
<form class="contact-us" action="<?php echo URL; ?>/public/contact/contactUs">
<input name="name" type="string">
<input name="email" type="email">
<input name="subject" type="string">
<textarea name="content"></textarea>
<input type="submit" name="contactUs"/>
   
</form>

</div>




</main>
<?php include('../app/views/inc/footer.php'); ?>
