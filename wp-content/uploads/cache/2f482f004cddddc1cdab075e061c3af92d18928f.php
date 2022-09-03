

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-page-header<?php echo e(get_field('image') ? '' : ' header-no-image'); ?>">
  <div class="page-title">
    <div class="pad">
      <div class="container-narrow">
        <h1 class="gradient"><?php echo e(get_the_title()); ?></h1>
      </div>
    </div>
  </div>

  <?php if(get_field('image')): ?>
  <div class="bg-cover" role="presentation" data-cover>
    <?php echo wp_get_attachment_image(get_field('image'), '2560x'); ?>

  </div>
  <?php endif; ?>
</section>