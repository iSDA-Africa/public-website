

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-parallax-image">
  <div class="parallax-copy">
    <div class="pad">
      <div class="container">
        <h3><?php echo get_field('copy'); ?></h3>
      </div>
    </div>
  </div>
  <?php 
  $imageId = get_field('image');
  $image = wp_get_attachment_image_src($imageId, 'full');
  ?>
  <div class="parallax-bg" style="background-image: url('<?php echo $image[0]; ?>')"></div>
</section>
