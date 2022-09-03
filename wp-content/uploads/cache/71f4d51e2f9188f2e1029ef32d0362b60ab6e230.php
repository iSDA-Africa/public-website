

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-founders">
  <div class="founders-upper">
    <div class="pad">
      <div class="container-wide">
        <h2>Our Founders</h2>
      </div>
    </div>
  </div>
  <div class="founders-lower">
    <div class="pad-left">
      <div class="container-wide">
        <div class="grid grid-3 grid-blocks grid-founders">
          <?php while(have_rows('founders')): ?>
            <?php the_row(); ?>
            <div class="cell">
              <div class="partner-inner">
                <?php $website = get_sub_field('website'); ?>
                <a href="<?php echo $website['url']; ?>">
                  <div class="founder-logo">
                    <div><?php echo wp_get_attachment_image(get_sub_field('logo'), '640x'); ?></div>
                  </div>

                  <?php if($website): ?>
                    <div class="link">
                      <p>Visit:</p>
                      <span class="arrow-right" target="_blank"><span><?php echo e($website['title']); ?></span><i></i></span>
                    </div>
                  <?php endif; ?>
                </a>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  </div>
</section>