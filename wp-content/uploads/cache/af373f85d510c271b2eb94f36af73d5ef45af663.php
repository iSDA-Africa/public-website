

<?php
$the_query = new WP_Query(
  array(
    'post_type' => 'partner',
    'status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'posts_per_page' => -1
  )
);
?>

<?php $block['classes'] = str_replace(',', ' ', $block['classes']); ?>

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> bg-grey-light block-partners-list">
  <div class="pad">
    <div class="container">
      <?php global $enable_sharing; ?>
      <?php if($enable_sharing): ?>
        <?php echo $__env->make('partials/sharing', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php $enable_sharing = false; ?>
      <?php endif; ?>
  
      <div class="container-narrow">
        <div class="partners-intro">
          <?php echo get_field('intro');; ?>

        </div>
      </div>
    </div>

    <?php if($the_query->have_posts()): ?>
    <div class="container">
      <div class="partners-grid">
        
          <?php while($the_query->have_posts()): ?>
            <?php $the_query->the_post(); ?>
            <?php global $post; ?>

            <?php $website = get_field('website', get_the_ID()); ?>

            <div class="partners-grid-item" data-scroll="<?php echo $post->post_name; ?>">
              <div class="partners-col">
                <div class="partners-logo">
                  <?php if(get_field('logo', get_the_ID())): ?>
                  <img src="<?php echo get_field('logo', get_the_ID()); ?>" alt="<?php echo get_the_title(); ?>">
                  <?php endif; ?>
                </div>
                
                <?php if($website): ?>
                  <div class="link show-desktop">
                    <p>Visit:</p>
                    <a href="<?php echo e($website['url']); ?>" class="arrow-right" target="_blank"><span><?php echo e($website['title']); ?></span><i></i></a>
                  </div>
                <?php endif; ?>
              </div>
              <div class="partners-col">
                <div class="partners-copy"><?php echo get_field('about', get_the_ID());; ?></div>

                <?php if($website): ?>
                  <div class="link show-mobile">
                    <p>Visit:</p>
                    <a href="<?php echo e($website['url']); ?>" class="arrow-right" target="_blank"><span><?php echo e($website['title']); ?></span><i></i></a>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>

