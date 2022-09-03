

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-page-header-deep image-bg">
  <div class="header-content">
    <div class="pad">
      <div class="container header-copy-wrapper">
        <div class="container-narrow">
          <h1 class="gradient"><?php echo e(get_the_title()); ?></h1>
          <div class="header-copy">
            <?php echo get_field('copy');; ?>

          </div>
        </div>
        <a class="btn btn-transparent btn-down-lg btn-scroll"><span>SCROLL</span><i></i></a>
      </div>
    </div>
  </div>
  <?php if(get_field('image')): ?>
  <div class="bg-cover" role="presentation" data-cover>
    <?php echo wp_get_attachment_image(get_field('image'), '2560x'); ?>

  </div>
  <?php endif; ?>
</section>