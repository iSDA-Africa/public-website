

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-narrow-copy block-copy">
  <div class="pad">
    <div class="container">
      <?php global $enable_sharing; ?>
      <?php if($enable_sharing): ?>
        <?php echo $__env->make('partials/sharing', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php $enable_sharing = false; ?>
      <?php endif; ?>

      <div class="container-narrow">
        <?php echo get_field('copy'); ?>

      </div>
    </div>
  </div>
</section>
