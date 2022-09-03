<?php $__env->startSection('content'); ?>
  <?php if(!have_posts()): ?>
    <section class="block-copy">
      <div class="pad">
        <div class="container container-narrow">
          
          <h1 class="gradient"><?php echo e(__('404: Page not found', 'isda')); ?></h1>
          <h2><?php echo e(__('It looks like the page you were looking for cannot be found or no longer exists.', 'isda')); ?></h2>
        
          <div class="btn-wrapper">
            <a class="btn btn-gradient btn-right" href="<?php echo get_home_url(); ?>"><span>Homepage<i></i></span></a>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>