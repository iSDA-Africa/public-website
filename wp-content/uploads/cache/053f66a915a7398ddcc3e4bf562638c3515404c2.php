

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-partners">
  <div class="pad-left">
    <div class="container-wide">

      <div class="grid grid-2 grid-blocks grid-no-overlap grid-partners grid-middle">
        <?php while(have_rows('partners')): ?>
          <?php the_row(); ?>
          <div class="cell">
            <div class="inner">
              <div>
                <h2><?php echo e(get_sub_field('name')); ?></h2>

                <div class="partner-logo">
                  <?php echo wp_get_attachment_image(get_sub_field('logo'), '640x'); ?>

                </div>

                <?php echo get_sub_field('about'); ?>


                <?php $website = get_sub_field('website'); ?>
                <?php if($website): ?>
                  <div class="link">
                    <p>Visit:</p>
                    <a href="<?php echo e($website['url']); ?>" class="arrow-right" target="_blank"><span><?php echo e($website['title']); ?><i></i></span></a>
                  </div>
                <?php endif; ?>

              </div>
            </div>
            <div class="square"><span></span></div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>

  </div>
</section>