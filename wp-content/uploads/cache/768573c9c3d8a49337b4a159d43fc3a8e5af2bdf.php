

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-image">
<?php
$sizes = array();
$sizes[] = wp_get_attachment_image_src(get_field('image'), '2560x')[0].' 2560w';
$sizes[] = wp_get_attachment_image_src(get_field('image'), '2560x')[0].' 1280w';
$sizes[] = wp_get_attachment_image_src(get_field('image'), '1280x')[0].' 640w';
$sizes[] = wp_get_attachment_image_src(get_field('image'), '1280x')[0].' 320w';
?>
<?php if(get_field('full_width')): ?>
  <div class="pad-left full-width-image">
    <?php echo wp_get_attachment_image(get_field('image'), '2560x', false, array('srcset' => implode(", ", $sizes))); ?>

    <?php if(get_field('caption')): ?>
      <div class="pad-carousel">
        <div class="container-narrow image-caption">
          <p><?php echo get_field('caption'); ?></p>
        </div>
      </div>
    <?php endif; ?>
  </div>
<?php else: ?>
  <div class="pad">
    <div class="container">
      <?php echo wp_get_attachment_image(get_field('image'), '2560x', false, array('srcset' => implode(", ", $sizes))); ?>

    </div>
    <?php if(get_field('caption')): ?>
      <div class="container-narrow image-caption">
        <p><?php echo get_field('caption'); ?></p>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>
</section>
