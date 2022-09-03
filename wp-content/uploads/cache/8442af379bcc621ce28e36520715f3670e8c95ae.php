

<?php $button = get_field('button'); ?>

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-soil-mapping-partners">
  <div class="pad">
    <div class="container">
      <div class="block-title">
        <?php echo get_field('title'); ?>

      </div>

      <div class="partner-tabs">
        <?php if(get_field('partners')): ?>
          <div class="partner-tabs-header">
            <div class="partner-tabs-header-inner">
              <?php $i=0; ?>
              <?php $__currentLoopData = get_field('partners'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(get_field('logo', $partner)): ?>
                  <div class="partner-tabs-header-item">
                    <div class="partner-tab-logo<?php echo e($i === 0 ? ' active' : ''); ?>" data-id="<?php echo e($i); ?>">
                      <div class="partner-tab-logo-inner">
                        <div style="background-image:url(<?php echo get_field('logo', $partner); ?>);"></div>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
                <?php $i++; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if(get_field('partners')): ?>
          <div class="partner-tabs-content">
            <?php $i=0; ?>
            <?php $__currentLoopData = get_field('partners'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="partner-tabs-content-item<?php echo e($i === 0 ? ' active' : ''); ?>" data-id="<?php echo e($i); ?>">
                <div class="partner-logo-mobile">
                  <div class="partner-logo-inner-mobile">
                    <div style="background-image:url(<?php echo get_field('logo', $partner); ?>);"></div>
                  </div>
                </div>
                <?php echo get_field('about', $partner);; ?>


                <?php $website = get_field('website', $partner); ?>
                <?php if($website): ?>
                  <div class="link">
                    <p>Visit:</p>
                    <a href="<?php echo e($website['url']); ?>" class="arrow-right" target="_blank"><span><?php echo e($website['title']); ?></span><i></i></a>
                  </div>
                <?php endif; ?>
              </div>
              <?php $i++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>