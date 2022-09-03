

<?php $map = get_field('google_map'); ?>

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-contact-us">
  <div class="pad">
    <div class="container-narrow">
      <div class="addresses">
        <?php if(have_rows('addresses')): ?>
        <div class="grid-wrapper grid-wrapper-md">
          <div class="grid grid-fit">
            <?php while(have_rows('addresses')): ?>
              <?php the_row(); ?>
              <div class="cell address">
                <div>
                  <h4><?php echo e(get_sub_field('location')); ?></h4>
                  <p><?php echo get_sub_field('address'); ?></p>
                  <?php if(get_sub_field('tel') || get_sub_field('email')): ?>
                    <div class="tel-email">
                      <?php if(get_sub_field('tel')): ?>
                      <p><span>Tel:</span><span><a href="tel:<?php echo str_replace(array(' ', '(0)'), '', get_sub_field('tel')); ?>"><?php echo get_sub_field('tel'); ?></a></span></p>
                      <?php endif; ?>
                      <?php if(get_sub_field('email')): ?>
                      <p><span>Email:</span><span><a href="mailto:<?php echo antispambot(get_sub_field('email')); ?>"><?php echo antispambot(get_sub_field('email')); ?></a></span></p>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
        <?php endif; ?>
        <div class="registration">
          <?php echo get_field('registration'); ?>

        </div>
      </div>
    </div>
  </div>


  <div class="pad-left">
    <div class="map" data-lat="<?php echo e($map['latitude']); ?>" data-lng="<?php echo e($map['longitude']); ?>" data-zoom="13"></div>
  </div>
</section>
