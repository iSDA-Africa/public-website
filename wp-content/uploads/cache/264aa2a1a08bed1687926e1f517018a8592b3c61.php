

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> gradient gradient-earth-light bg-topography block-current-activities block-more-about-isdasoil">
  <div class="pad">
    <div class="container-medium">
      <div class="block-title">
        <h1><?php echo get_field('title'); ?></h1>
      </div>

      <div class="grid-wrapper">
        <div class="grid grid-3">
          
            <?php if(get_field('links')): ?>
              
              <?php $__currentLoopData = get_field('links'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pageId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php 
                $imageId = get_field('page_image', $pageId);
                $image = wp_get_attachment_image_src($imageId, '640x');
                ?>
                <div class="cell">
                <a class="other-acitivity" href="<?php echo get_permalink($pageId); ?>">
                  <span class="grid-meta">
                    <span class="grid-title"><h2 class="gradient"><?php echo get_the_title($pageId); ?></h2></span>
                  </span>
                  <span class="panel-bg" style="background-image:url(<?php echo $image[0]; ?>)"></span>
                </a>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            <?php endif; ?>
          
        </div>
      </div>
    </div>
  </div>
  <?php if(get_field('links')): ?>
  <div class="activities-popup-content">
    <div class="pad">
      <div class="container-wide">
        <div class="activities-popup-wrapper">
          <div class="grid-wrapper">
            <div class="grid grid-4 activities-list">
            <div class="cell">
              <div class="popup-logo"><img src="<?= App\asset_path('images/iSDASoil_Logo_Landscape_Pos_RGB.svg'); ?>" alt="iSDASoil"></div>
            </div>
              <?php $__currentLoopData = get_field('links'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pageId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php 
                $imageId = get_field('page_image', $pageId);
                $image = wp_get_attachment_image_src($imageId, '640x');
                ?>
                <div class="cell">
                  <a class="other-acitivity" href="<?php echo get_permalink($pageId); ?>">
                    <span class="grid-meta">
                      <span class="grid-title"><h2 class="gradient"><?php echo get_the_title($pageId); ?></h2></span>
                    </span>
                    <span class="panel-bg" style="background-image:url(<?php echo $image[0]; ?>)"></span>
                  </a>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
</section>