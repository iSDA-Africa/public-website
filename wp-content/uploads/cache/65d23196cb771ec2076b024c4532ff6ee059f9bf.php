

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-gallery">
  <div class="pad">
    <div class="container">
      <div class="grid-wrapper">
        <div class="grid grid-2 grid-gallery">
          <?php $images = get_field('images'); ?>
          <?php if(get_field('gallery_style') === "style1"): ?>
          <div class="cell">
            <div>
              <?php if($images[0]['image']): ?>
                <?php echo wp_get_attachment_image($images[0]['image'], '1280x'); ?>

              <?php endif; ?>
            </div>
            <div>
              <?php if($images[1]['image']): ?>
                <?php echo wp_get_attachment_image($images[1]['image'], '1280x'); ?>

              <?php endif; ?>
            </div>
          </div>
          <div class="cell">
            <div>
              <?php if($images[2]['image']): ?>
                <?php echo wp_get_attachment_image($images[2]['image'], '1280x'); ?>

              <?php endif; ?>
            </div>
          </div>
          <?php elseif(get_field('gallery_style') === "style2"): ?>
          <div class="cell">
            <div>
              <?php if($images[0]['image']): ?>
                <?php echo wp_get_attachment_image($images[0]['image'], '1280x'); ?>

              <?php endif; ?>
            </div>
          </div>
          <div class="cell">
            <div>
              <?php if($images[1]['image']): ?>
                <?php echo wp_get_attachment_image($images[1]['image'], '1280x'); ?>

              <?php endif; ?>
            </div>
            <div>
              <?php if($images[2]['image']): ?>
                <?php echo wp_get_attachment_image($images[2]['image'], '1280x'); ?>

              <?php endif; ?>
            </div>
          </div>
          <?php elseif(get_field('gallery_style') === "style3"): ?>
          <div class="cell cell-gallery-3">
            <div>
              <div class="gallery-3-image-1">
              <?php if($images[0]['image']): ?>
                <?php echo wp_get_attachment_image($images[0]['image'], '1280x'); ?>

              <?php endif; ?>
              </div>
            </div>
          </div>
          <div class="cell cell-gallery-3">
            <div>
              <div class="gallery-3-image-2">
              <?php if($images[1]['image']): ?>
                <?php echo wp_get_attachment_image($images[1]['image'], '1280x'); ?>

              <?php endif; ?>
              </div>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
