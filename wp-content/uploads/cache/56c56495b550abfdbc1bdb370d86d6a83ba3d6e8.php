

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-soil-mapping-feature">
  <?php 
  $link = get_field('link');
  ?>

  <div class="pad">
    <div class="container-wide">

      <div class="panel gradient gradient-earth-reverse bg-topography">
        <?php if(get_field('image')): ?>
          <div class="panel-thumb">
          <div class="panel-thumb-inner">
            <?php echo wp_get_attachment_image(get_field('image'), '640x'); ?>

            </div>
          </div>
        <?php endif; ?>
        <div class="panel-meta">
            <span class="panel-title">
              <h2><?php echo get_field('title'); ?></h2>
            </span>
            
        </div>
        <div class="panel-more">
          <a class="btn btn-xsm btn-right" href="<?php echo $link['url']; ?>"><span><?php echo $link['title']; ?><i></i></span></a>
        </div>
      </div>

    
    </div>
  </div>
</section>
