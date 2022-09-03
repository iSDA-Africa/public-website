

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> gradient block-contact-form">
  <div class="pad">
    <div class="container">
      <div class="form">
      <?php echo do_shortcode(get_field('contact_form_shortcode')); ?>

      </div>
    </div>
  </div>
</section>