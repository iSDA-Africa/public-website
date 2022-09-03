

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> bg-grey-light block-more-information about-styling">
  <div class="pad">
    <div class="container-info">
      <div class="more-info-wrapper">
        <div class="more-info-left">
          <div class="more-info-copy">
            <?php echo get_field('copy'); ?>

          </div>
        </div>
        <div class="more-info-right">
          <?php echo wp_get_attachment_image(get_field('image'), '2560x'); ?>

        </div>
      </div>
    </div>
  </div>
</section>