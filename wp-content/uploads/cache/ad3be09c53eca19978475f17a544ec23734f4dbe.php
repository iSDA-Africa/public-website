

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-team-list">
  <?php $rows = get_field('sections'); ?>
  <?php if (count($rows) > 1): ?>
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
  </div>
  <?php endif; ?>
  <div class="pad">
    <div class="container-narrow tab-container">
      <?php $i=0; ?>
      <?php while(have_rows('sections')): ?>
        <?php the_row(); ?>
        <div class="tab-content<?php echo $i===0 ? ' active' : ''; ?>" data-id="<?php echo e($i); ?>">
          <ul class="team-list">
            <?php while(have_rows('team_list')): ?>
              <?php the_row(); ?>
              <li>
                <?php if(get_sub_field('image')): ?>
                <div class="portrait">
                  <?php echo wp_get_attachment_image(get_sub_field('image'), '640x'); ?>

                </div>
                <?php endif; ?>
                <div class="bio">
                  <div class="name">
                    <h2><?php echo e(get_sub_field('name')); ?></h2>
                    <?php if(get_sub_field('job_title')): ?>
                    <p><?php echo e(get_sub_field('job_title')); ?></p>
                    <?php endif; ?>
                  </div>
                  <?php echo get_sub_field('bio'); ?>

                </div>
              </li>
            <?php endwhile; ?>
          </ul>
        </div>
        <?php $i++; ?>
      <?php endwhile; ?>
    </div>
  </div>
</section>