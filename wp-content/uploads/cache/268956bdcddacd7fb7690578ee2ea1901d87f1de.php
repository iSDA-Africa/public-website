

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> gradient-light block-contact-form block-contact-form-wide">
  <div class="pad">
    <div class="container-narrow">
      <?php echo get_field('content'); ?>


      <div class="form">
      <?php echo do_shortcode(get_field('contact_form_shortcode')); ?>

      </div>
    </div>
  </div>
  <div class="flowerbed">
    <div class="line"></div>
  </div>
</section>