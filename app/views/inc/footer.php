


</div> <!-- container div -->
<footer>
  <p>Judgement Day PVE &copy; <?php echo Date('Y'); ?>
  <div>
  </div>
  <div>
  </div>
  <div>
  </div>

  <script>


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
</footer>
</body>
</html>
