

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> gradient-light block-intro about-styling">
  <div class="pad">
    <div class="container-wide">
      <?php global $enable_sharing; ?>
      <?php if($enable_sharing): ?>
        <?php echo $__env->make('partials/sharing', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php $enable_sharing = false; ?>
      <?php endif; ?>
  
      <div class="container-medium">
        <div class="intro-wrapper">
          <div class="intro-left">
            <?php echo get_field('copy_left');; ?>

          </div>
          <div class="intro-right">
            <?php echo get_field('copy_right');; ?>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="flowerbed">
    <div class="line"></div>
  </div>
</section>

