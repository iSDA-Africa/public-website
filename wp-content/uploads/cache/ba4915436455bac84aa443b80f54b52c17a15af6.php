<a class="logo primary-logo" href="<?php echo home_url(); ?>"></a>
<header>
  <a class="hamburger">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
  </a>

  <a class="sidebar-logo" href="<?php echo \App\isSoilMappingSection() ? get_permalink(564) : home_url(); ?>"></a>
  <nav class="primary-nav">
    <a class="logo nav-logo" href="<?php echo home_url(); ?>"></a>
    <div class="nav-wrapper">
      <div class="pad">
        <div class="container">
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
        </div>
      </div>
    </div>
  </nav>
  <?php global $post; ?>
  <?php if($post): ?>
    <?php if($post->ID === 564): ?>
    <a class="sidebar-arrow btn-down-sm"><span><i></i></span></a>
    <?php endif; ?>
  <?php endif; ?>
</header>
