<footer>
  <div class="pad">
    <div class="container">
      <div class="nav-wrapper">
        <nav>
          <div class="grid-wrapper grid-wrapper-nav">
            <div class="grid grid-fit">
              <?php for($i=1; $i<=5; $i++): ?>
                <?php if(has_nav_menu('footer_navigation_'.$i)): ?>
                  <div class="cell">
                    <div>
                      <div class="menu-name"><h4><?php echo e(wp_get_nav_menu_name('footer_navigation_'.$i)); ?></h4></div>
                      <?php echo wp_nav_menu(['theme_location' => 'footer_navigation_'.$i, 'menu_class' => 'nav']); ?>

                    </div>
                  </div>
                <?php endif; ?>
              <?php endfor; ?>
            </div>
          </div>
        
        <div class="get-in-touch">
          <div class="btn-wrapper">
            <a class="btn btn-right" href="<?php echo get_permalink(37); ?>"><span>Contact us<i></i></span></a>
          </div>
          <div class="social">
            <?php if (get_field('instagram', 'options')): ?>
              <a class="icon-instagram" href="<?php the_field('instagram', 'options'); ?>" target="_blank"></a>
            <?php endif; ?>
            <?php if (get_field('twitter', 'options')): ?>
              <a class="icon-twitter" href="<?php the_field('twitter', 'options'); ?>" target="_blank"></a>
            <?php endif; ?>
          </div>
        </div>
        <?php if(has_nav_menu('footer_terms')): ?>
        <div class="website-terms">
          <?php echo wp_nav_menu(['theme_location' => 'footer_terms', 'menu_class' => 'nav']); ?>

        </div>
        <?php endif; ?>
        </nav>
        <div class="footer-logo">
          <a href="<?php echo home_url(); ?>"></a>
        </div>
        <div class="copyright"><span>&copy; Copyright 2012-<?php echo e(date('Y')); ?> iSDA</span><span>All Rights Reserved</span></div>
      </div>
    </div>
  </div>
</footer>
<div id="cookie-popup">
  <div class="cookie-message-wrapper">
    <div class="cookie-message">
      <p>Our website uses cookies. Find out how and why in our <a href="<?php echo get_permalink(3); ?>">Cookie Policy</a></p>
    </div>
    <div><a class="btn btn-gradient btn-close"><span>Accept</span></a></div>
  </div>
</div>
<a class="btn btn-gradient btn-contact-cta">
  <span class="cta-1">INTERESTED?</span>
  <span class="cta-2">SEND US A MESSAGE</span>
</a>
<div class="activities-popup"></div>