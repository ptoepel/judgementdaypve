


</div> <!-- container div -->

<footer>
  <p>Judgement Day PVE &copy; <?php echo Date('Y'); ?>
  <div>
  </div>
  <div>
  </div>
  <div>
  </div>
  <script src="<?php echo URL; ?>/public/js/jquery.js"></script>

  <script>
$(window).on('load', function(){
    $('#cover').fadeOut(1900);
})

const menuBtn = document.querySelector('.menu-btn');
const menu = document.querySelector('.menu');
const menuNav = document.querySelector('.menu-nav');
const menuBranding = document.querySelector('.menu-branding');
const navItems = document.querySelectorAll('.nav-item');

function toggleMenu(){
  if(!showMenu){
    menuBtn.classList.add('close');
    menu.classList.add('show');
    menuNav.classList.add('show');
    menuBranding.classList.add('show');
    navItems.forEach(item => item.classList.add('show'));

    showMenu = true;
  }else{
    menuBtn.classList.remove('close');
    menu.classList.remove('show');
    menuNav.classList.remove('show');
    menuBranding.classList.remove('show');
    navItems.forEach(item=> item.classList.remove('show'));

    showMenu = false;
  }

}

let showMenu = false;

if(menuBtn){
  menuBtn.addEventListener('click',toggleMenu);
}



</script>

<script src="<?php print URL; ?>/public/js/home.js"></script>
<script src="<?php print URL; ?>/public/js/about.js"></script>
<script src="<?php print URL; ?>/public/js/contact.js"></script>
<script src="<?php print URL; ?>/public/js/register.js"></script>
<script src="<?php print URL; ?>/public/js/login.js"></script>
<script src="<?php print URL; ?>/public/js/h.js"></script>
<script src="<?php print URL; ?>/public/js/home.js"></script>
<script src="<?php print URL; ?>/public/js/home.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="<?php echo URL; ?>/public/js/app.js"></script>
</footer>
</body>
</html>
