

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-spacial-agronomy-panels">

  <?php if(have_rows('panels')): ?>
    <div class="pad-left">
      
      <?php while(have_rows('panels')): ?>
        <div class="grid-wrapper grid-wrapper-none spacial-agronomy-panel">
          <div class="grid grid-2 grid-panels">
            <?php the_row(); ?>

            <?php $images = get_sub_field('images'); ?>

            <div class="cell">
              <div class="panel-bg">
                <div class="panel-bg-inner">
                  <div class="gradient"><div class="bg-topography"><span style="background-image:url('<?php echo get_sub_field('background'); ?>')"></span></div></div>
                </div>
                <div class="panel-title">
                  <div class="pad-outer">
                    <div class="container-soil-mapping">
                      <div class="title">
                        <h2><?php echo get_sub_field('title'); ?></h2>
                      </div>
                      <div class="images">
                        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php echo wp_get_attachment_image($image, '640x'); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="cell">
              <div>
                <div class="pad-outer">
                  <div class="container-soil-mapping">
                    <div class="pad-inner">
                      <?php echo get_sub_field('copy'); ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      <?php endwhile; ?>
        
    </div>
  <?php endif; ?>
</section>
