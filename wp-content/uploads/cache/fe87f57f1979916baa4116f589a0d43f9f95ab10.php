

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> gradient bg-topography block-read-more block-soil-mapping-intro">
  <div class="pad">
    <div class="container">
      <div class="grid-wrapper grid-wrapper-lg">
        <div class="grid grid-2 grid-center">
          <div class="cell">
            <div>
              <?php echo get_field('copy'); ?>

            </div>
          </div>
          <div class="cell cell-image">
            <div>
              <?php echo wp_get_attachment_image(get_field('image'), '1280x'); ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>