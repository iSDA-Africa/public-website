

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-page-link">
  <?php 
  $imageId = get_field('page_image_alt', get_field('page'));
  $image = wp_get_attachment_image_src($imageId, '1280x');
  ?>

  <div class="pad">
    <div class="container">
      <a class="panel" href=<?php echo get_permalink(get_field('page')); ?>>
        <span class="panel-meta">
          <span class="panel-title">
            <h2 class="gradient"><?php echo get_the_title(get_field('page')); ?></h2>
            <h5><?php echo get_field('subtitle'); ?></h5>
          </span>
          <span class="panel-more">
            <span class="btn btn-xsm btn-right"><span>More<i></i></span></span>
          </span>
        </span>
        <?php if($image): ?>
        <span class="panel-bg" style="background-image:url(<?php echo $image[0]; ?>)"></span>
        <?php endif; ?>
      </a>
    </div>
  </div>
</section>
