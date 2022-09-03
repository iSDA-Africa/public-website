

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-half-width-copy block-copy">
  <div class="pad">
    <div class="container">
      <div class="grid-wrapper">
        <div class="grid grid-2">
          <div class="cell">
            <div><?php echo get_field('copy'); ?></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
