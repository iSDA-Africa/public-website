

<?php if(have_rows('services_list')): ?>
<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-services-list">
  <div class="pad">
    <div class="container-wide">
      <ul class="block-list-full">
        <?php while(have_rows('services_list')): ?>
          <?php the_row(); ?>

          <li>
            <div class="inner">
              <div class="service-logo">
                <span class="off" style="background-image:url(<?php echo get_sub_field('image_off_state'); ?>)"></span>
                <span class="on" style="background-image:url(<?php echo get_sub_field('image_on_state'); ?>)"></span>
              </div>
              <div class="copy">
                <div class="container-narrow">
                  <h2><?php echo e(get_sub_field('title')); ?></h2>
                  <?php echo get_sub_field('about'); ?>


                  <?php $website = get_sub_field('website'); ?>
                  <?php if($website): ?>
                    <div class="link">
                      <p>External resource:</p>
                      <a href="<?php echo e($website['url']); ?>" class="arrow-right" target="_blank"><span><?php echo e($website['title']); ?></span><i></i></a>
                    </div>
                  <?php endif; ?>

                </div>
              </div>
            </div>
            <div class="square"><span></span></div>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>
  </div>
</section>
<?php endif; ?>
