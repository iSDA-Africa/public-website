

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-bio-details">
  <div class="pad">
    <div class="container-narrow">
      <h3><?php echo get_field('name'); ?></h3>
      <p><?php echo get_field('job_title'); ?></p>
      <a class="arrow-right" href="{<?php echo get_field('link'); ?>"><span>BIO</span><i></i></a>
    </div>
  </div>
</section>