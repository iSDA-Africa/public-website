

<?php $button = get_field('button'); ?>

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> gradient gradient-reverse block-read-more">
  <div class="pad">
    <div class="container">
      <div class="grid-wrapper grid-wrapper-lg">
        <div class="grid grid-2 grid-center">
          <div class="cell cell-image">
            <div>
              <?php echo wp_get_attachment_image(get_field('image'), '1280x'); ?>

            </div>
          </div>
          <div class="cell">
            <div>
              <?php echo get_field('copy'); ?>


              <?php if($button): ?>
              <div class="btn-wrapper btn-spacer">
                <a class="btn btn-right" href="<?php echo e($button['url']); ?>"><span><?php echo e($button['title']); ?><i></i></span></a>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>