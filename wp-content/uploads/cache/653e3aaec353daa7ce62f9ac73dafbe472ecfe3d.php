

<?php $button = get_field('button'); ?>

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-soil-mapping-panels block-soil-mapping">

  <div class="pad">
    <div class="container">
      <div class="block-title">
        <?php echo get_field('intro'); ?>

      </div>
    </div>
  </div>

  <?php if(have_rows('panels')): ?>
    <div class="pad-left">
      
      <?php while(have_rows('panels')): ?>
        <div class="grid-wrapper grid-wrapper-none soil-mapping-panel">
          <div class="grid grid-2 grid-center grid-panels">
            <?php the_row(); ?>
            <?php $link = get_sub_field('link'); ?>

            <div class="cell">
              <div>
                <div class="pad-outer">
                  <div class="container-soil-mapping">
                    <div class="pad-inner">
                      <?php echo get_sub_field('copy'); ?>


                      <?php if($link): ?>
                        <a class="arrow-right" href="<?php echo $link['url']; ?>"><span><?php echo $link['title']; ?></span><i></i></a>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="cell">
              <div class="panel-image image-shadow">
                <?php echo wp_get_attachment_image(get_sub_field('image'), '1280x'); ?>

              </div>
              <div class="panel-bg">
                <div class="gradient gradient-earth"><div class="bg-topography"></div></div>
              </div>
            </div>

          </div>
        </div>
      <?php endwhile; ?>
        
    </div>
  <?php endif; ?>
</section>