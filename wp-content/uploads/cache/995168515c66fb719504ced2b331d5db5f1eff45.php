

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-more-information-blocks about-styling">
  <div class="pad">
    <div class="container-narrow">
      <div class="grid-wrapper grid-wrapper-more-info">
        <div class="grid grid-2">
          <div class="cell">
            <div class="copy">
              <div>
                <?php echo get_field('copy'); ?>

                <div class="show-desktop">
                  <a class="btn btn-xsm btn-right" href="<?php echo get_field('link'); ?>"><span>More<i></i></span></a>
                </div>
              </div>
            </div>
            <div class="image image1">
              <?php echo wp_get_attachment_image(get_field('image1'), '640x'); ?>

            </div>
          </div>
          <div class="cell">
            <div class="image image2">
              <?php echo wp_get_attachment_image(get_field('image2'), '640x'); ?>

            </div>
            <div class="image image3">
              <?php echo wp_get_attachment_image(get_field('image3'), '640x'); ?>

            </div>
            <div class="show-mobile more-wrapper">
              <a class="btn btn-xsm btn-right" href="<?php echo get_field('link'); ?>"><span>More<i></i></span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>