

<?php $button = get_field('button'); ?>

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-pilot">
  <div class="pad">
    <div class="container">
      <a class="pilot-panel" href="<?php echo e($button['url']); ?>">
        <?php if(get_field('image')): ?>
        <div class="bg-cover" role="presentation" data-cover>
          <?php echo wp_get_attachment_image(get_field('image'), '2560x'); ?>

        </div>
        <?php endif; ?>
        <div class="pilot-copy">
          <h2 class="gradient"><?php echo e(get_field('title')); ?></h2>
          <?php echo get_field('copy'); ?>

        </div>
        <?php if($button): ?>
        <div class="btn-wrapper"><span class="btn btn-right btn-gradient"><span><?php echo e($button['title']); ?><i></i></span></span></div>
        <?php endif; ?>
      </a>
    </div>
  </div>
</section>
