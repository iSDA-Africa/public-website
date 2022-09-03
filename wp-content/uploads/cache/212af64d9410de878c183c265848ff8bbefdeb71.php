

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-list-of-logos">
  <div class="pad">
    <div class="container">
      <div class="block-title">
        <?php echo get_field('title'); ?>

      </div>
      <div class="grid-wrapper grid-wrapper-sm">
        <div class="grid grid-5">
          <?php $logos = get_field('logos'); ?>
          <?php $__currentLoopData = $logos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="cell">
              <div class="logo-item">
                <div style="background-image:url('<?php echo $logo; ?>');"></div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
