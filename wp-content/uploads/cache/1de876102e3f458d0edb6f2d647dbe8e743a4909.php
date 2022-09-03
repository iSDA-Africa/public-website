

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> bg-grey-light block-other-activities">
  <div class="pad">
    <div class="container-medium">
      <div class="block-title">
        <h1><?php echo get_field('title'); ?></h1>
      </div>

      <?php if(get_field('links')): ?>
      <div class="grid-wrapper grid-wrapper-md">
        <div class="grid grid-2">
          <?php $__currentLoopData = get_field('links'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pageId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="cell">
              <?php 
              $imageId = get_field('page_image', $pageId);
              $image = wp_get_attachment_image_src($imageId, '640x');
              ?>
              <a class="other-acitivity" href="<?php echo get_permalink($pageId); ?>">
                <span class="grid-meta">
                  <span class="grid-title"><h2 class="gradient"><?php echo get_the_title($pageId); ?></h2></span>
                  <span class="grid-more">
                    <span class="arrow-right"><span>More</span><i></i></span>
                  </span>
                </span>
                <span class="panel-bg" style="background-image:url(<?php echo $image[0]; ?>)"></span>
              </a>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>