

<?php $button = get_field('button'); ?>

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> gradient gradient-earth bg-topography block-read-more block-read-more-soil-mapping block-soil-mapping">
  <div class="pad">
    <div class="container">
      <div class="grid-wrapper grid-wrapper-lg">
        <div class="grid grid-2-1-reverse grid-center">
          <div class="cell">
            <div>
              <?php echo get_field('copy'); ?>


              <?php if($button): ?>
              <div class="btn-wrapper btn-spacer">
                <a class="btn btn-right" href="<?php echo e($button['url']); ?>"><span><?php echo e($button['title']); ?><i></i></span></a>
              </div>
              <?php endif; ?>
            </div>
          </div>
          <div class="cell cell-image image-center">
            <div>
              <div class="screen">
                <div class="screen-inner">
                  <?php $__currentLoopData = get_field('screen_images'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo wp_get_attachment_image($image, '1280x'); ?>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>