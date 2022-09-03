

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> gradient gradient-light-reverse block-email-us">
  <div class="pad">
    <div class="container">
      <div class="email-us-panel">
        <div class="grid-wrapper grid-wrapper-about">
          <div class="grid grid-2 grid-center">
            <div class="cell">
              <div>
                <?php echo get_field('copy'); ?>

              </div>
            </div>
            <div class="cell">
              <div class="cell-full">
                <?php $button = get_field('button'); ?>
                <a class="btn btn-right btn-gradient" href="<?php echo $button['url']; ?>"><span><?php echo $button['title']; ?><i></i></span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>