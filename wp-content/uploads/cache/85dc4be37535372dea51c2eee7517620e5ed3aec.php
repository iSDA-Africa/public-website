

<?php if(have_rows('carousel_items')): ?>
  <section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> bg-grey-light block-carousel">
    <div class="pad-left">
      <div class="carousel-wrapper carousel-small">

        <?php while(have_rows('carousel_items')): ?>
          <?php the_row(); ?>
          
          <div class="carousel-slide">
            <div class="pad-carousel">
              <div class="container slide-title">
                <h1><?php echo get_sub_field('title'); ?></h1>
              </div>
              <div class="container-carousel">
                <div class="carousel-slide-content">
                  <?php echo wp_get_attachment_image(get_sub_field('image'), '1280x'); ?>

                  <div class="slide-copy">
                    <?php echo get_sub_field('copy'); ?>

                  </div>
                  <div class="btn-wrapper">
                    <a class="btn btn-sm btn-right btn-gradient" href="<?php echo get_sub_field('link'); ?>"><span>More<i></i></span></a>
                  </div>
                </div>
                <div class="carousel-slide-bg"></div>
              </div>
            </div>
          </div>
          
        <?php endwhile; ?>

      </div>
    </div>
  </section>
<?php endif; ?>
