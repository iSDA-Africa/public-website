

<?php if(get_field('page_links')): ?>
  <section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> bg-grey-light block-about-us-links">
    <div class="pad">
      <div class="container-medium">
        <h1>More…</h1>

        <div class="grid-wrapper grid-wrapper-about">
          <div class="grid grid-2">
            <?php $__currentLoopData = get_field('page_links'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pageId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="cell">
                

                <div class="carousel-slide">
                  <div class="carousel-slide-content">
                    <?php echo wp_get_attachment_image(get_field('page_image', $pageId), '1280x'); ?>

                    <div class="slide-copy">
                      <h2><?php echo get_the_title($pageId); ?></h2>
                    </div>
                    <div class="btn-wrapper">
                      <a class="btn btn-xsm btn-right btn-gradient" href="<?php echo get_permalink($pageId); ?>"><span>More<i></i></span></a>
                    </div>
                  </div>
                  <div class="carousel-slide-bg"></div>
                </div>

            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>