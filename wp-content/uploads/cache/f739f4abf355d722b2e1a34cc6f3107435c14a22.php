

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-tab-blocks">
  <div class="pad-left">
    <div class="tabs">
      <?php $i=0; ?>

      <?php while(have_rows('sections')): ?>
        <?php the_row(); ?>

        <a<?php echo $i===0 ? ' class="active"' : ''; ?> data-id="<?php echo e($i); ?>">
          <div><span><?php echo e(get_sub_field('section_title')); ?></span></div><i></i>
        </a>

        <?php $i++; ?>
      <?php endwhile; ?>
    </div>

    <div class="mobile-select">
      <div class="pad">
        <div class="container-narrow">
          <select>
            <?php $i=0; ?>

            <?php while(have_rows('sections')): ?>
              <?php the_row(); ?>
              <option value="<?php echo e($i); ?>"><?php echo e(get_sub_field('section_title')); ?></option>
              <?php $i++; ?>
            <?php endwhile; ?>
          </select>
        </div>
      </div>
    </div>

    <div class="container-wide tab-container">
      <?php $i=0; ?>
      <?php while(have_rows('sections')): ?>
        <?php the_row(); ?>
        <div class="tab-content<?php echo $i===0 ? ' active' : ''; ?>" data-id="<?php echo e($i); ?>">
          <div class="grid grid-2 grid-blocks blocks-<?php echo e(count(get_sub_field('section_blocks'))); ?>">
            <?php while(have_rows('section_blocks')): ?>
              <?php the_row(); ?>
              <div class="cell">
                <div class="inner">
                  <?php if(get_sub_field('image_off_state') || get_sub_field('image_on_state')): ?>
                    <div class="service-logo">
                      <?php if(get_sub_field('image_off_state')): ?>
                      <span class="off" style="background-image:url(<?php echo get_sub_field('image_off_state'); ?>)"></span>
                      <?php endif; ?>
                      <?php if(get_sub_field('image_on_state')): ?>
                      <span class="on" style="background-image:url(<?php echo get_sub_field('image_on_state'); ?>)"></span>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>
                  <div class="copy">
                    <div class="container-narrow">
                      <h2><?php echo e(get_sub_field('block_title')); ?></h2>
                      <?php echo get_sub_field('block_copy'); ?>


                      <?php $button = get_sub_field('link'); ?>
                      <?php if($button): ?>
                        <div class="link">
                          <p>External Resource:</p>
                          <a href="<?php echo e($button['url']); ?>" class="arrow-right" target="_blank"><span><?php echo e($button['title']); ?><i></i></span></a>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <div class="square"><span></span></div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
        <?php $i++; ?>
      <?php endwhile; ?>
    </div>
  </div>
</section>