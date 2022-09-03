

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-full-width-image">
  <div class="pad-left full-width-image-wrapper">
    <?php echo wp_get_attachment_image(get_field('image'), '2560x'); ?>

  </div>
</section>
