<footer class="w-100 py-4 flex-shrink-0">
  <div class="container py-4">
      <div class="row gy-4 gx-5">
          <div class="col-lg-4 col-md-6">
              <h5 class="h1 text-white">Easy Fast Fix</h5>
              <p class="small">Developed by: Group Venezuela (Venezuela@easyfastfix.org)</p>
              <p class="small text-muted mb-0">&copy; Copyrights. All rights reserved.</p>
          </div>
          <div class="col-lg-2 col-md-6">
              <h5 class="text-white mb-3">Site Map</h5>
              <ul class="list-unstyled text-muted">
                  <li><a href="index.php">Home</a></li>
                  <li><a href="history.php">About</a></li>
                  <li><a href="services.php">Products & Services</a></li>
                  <li><a href="price.php">Price Plan</a></li>
                  <li><a href="testimonials.php">Testimonials</a></li>
              </ul>
          </div>
          <div class="col-lg-2 col-md-6">
              <h5 class="text-white mb-3">Products & Services</h5>
              <ul class="list-unstyled text-muted">
                  <li><a href="services.php">Trucking & Delivery</a></li>
                  <li><a href="hardware.php">Hardware</a></li>
                  <li><a href="electrical.php">Electrical Supplies</a></li>
              </ul>
          </div>
          <div class="col-lg-4 col-md-6">
              <h5 class="text-white mb-3">Connect with us</h5>
              <p class="small text-muted">Receive updates about our products, services, promos, and events via our social media accounts.</p> 
              <div class="social-links mb-3">
                  <a href="http://fb.me/" target="_blank" class="facebook"><i class="fab fa-facebook"></i></a>
                  <a href="https://www.instagram.com/" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a>
              </div>
          </div>
      </div>
  </div>
</footer> 
</body>

<script>
  $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
    if (!$(this).next().hasClass('show')) {
      $(this).parents('.dropdown-menu').first().find('.show').removeClass('show');
    }
    var $subMenu = $(this).next('.dropdown-menu');
    $subMenu.toggleClass('show');
  
  
    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
      $('.dropdown-submenu .show').removeClass('show');
    });
  
  
    return false;
    });
  
    jQuery('.dropdown').hover(function() {
  
  jQuery(this).find('.main-dropdown').stop(true, true).delay(100).fadeIn(400);
  }, function() {
  jQuery(this).find('.main-dropdown').stop(true, true).delay(100).fadeOut(400);
  });

  jQuery('.sub-menu').hover(function() {

  jQuery(this).find('.sub-dropdown').stop(true, true).delay(100).fadeIn(400);
  }, function() {
  jQuery(this).find('.sub-dropdown').stop(true, true).delay(100).fadeOut(400);
  });

</script>