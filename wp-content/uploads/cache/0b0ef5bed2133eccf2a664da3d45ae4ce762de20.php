

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-page-header-full-screen image-bg">
  <div class="pad-left">
    <?php if(have_rows('carousel_items')): ?>
      <div class="carousel-wrapper">
        <div class="carousel-large">
          <?php while(have_rows('carousel_items')): ?>
            <?php the_row(); ?>
            <div class="carousel-slide">
              <div class="pad-carousel">
                <div class="container">
                  <div class="copy">
                    <?php echo get_sub_field('copy'); ?>

                  </div>
                  <?php if(get_sub_field('link')): ?>
                  <div class="btn-wrapper">
                    <a class="btn btn-sm btn-gradient btn-right" href="<?php echo get_sub_field('link'); ?>"><span>More<i></i></span></a>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
              <?php if(get_sub_field('image')): ?>
              <?php
              $images = array();
              $images[] = wp_get_attachment_image_src(get_sub_field('image'), '2560x')[0].' 2560w';
              $images[] = wp_get_attachment_image_src(get_sub_field('image'), '1280x')[0].' 1280w';
              //$images[] = wp_get_attachment_image_src(get_sub_field('mobile_image'), '1280x')[0].' 640w';
              if (get_sub_field('mobile_image')) {
                $images[] = wp_get_attachment_image_src(get_sub_field('mobile_image'), '640x')[0].' 640w';
              } else {
                $images[] = wp_get_attachment_image_src(get_sub_field('image'), '640x')[0].' 640w';
              }

              $sizes = "(min-width: 800px) 1280px, (min-width: 1280px) 2560px, 100vw";
              
              ?>
              <div class="bg-cover" role="presentation" data-cover data-focus="75">
                <?php echo wp_get_attachment_image(get_sub_field('image'), '2560x', false, array('sizes' => $sizes, 'srcset' => implode(", ", $images))); ?>

              </div>
              <?php endif; ?>
            </div>
          <?php endwhile; ?>
        </div>
        <div class="carousel-controls"></div>
      </div>
    <?php endif; ?>
    <a class="btn btn-transparent btn-down-lg btn-scroll"><span>SCROLL TO DISCOVER MORE</span><i></i></a>
  </div>
  
</section>