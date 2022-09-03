

<?php
$the_query = new WP_Query(
  array(
    'post_type' => 'publication',
    'status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => get_option( 'posts_per_page' )
  )
);
?>

<?php if($the_query->have_posts()): ?>
<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-blog-list">
  <div class="pad">
    <div class="container-narrow publications-intro">
      <?php echo get_field('intro'); ?>

    </div>

    <div class="container-wide">
      <div class="grid-wrapper grid-wrapper-md">
        <div class="grid grid-3 grid-articles">
          <?php while($the_query->have_posts()): ?>
            <?php $the_query->the_post(); ?>

            <div class="cell">
              <a href="<?php echo the_permalink(); ?>">
                <span class="grid-img" style="background-image:url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'blog-grid'); ?>')"></span>
                <span class="grid-meta">
                  <span class="grid-title">
                    <h3><?php echo the_title(); ?></h3>
                  </span>
                  <span class="grid-more">
                    <span class="arrow-right"><span>More</span><i></i></span>
                  </span>
                </span>
              </a>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
      <?php if($the_query->post_count >= get_option( 'posts_per_page' )): ?>
      <div class="load-more">
        <a class="gradient" data-type="publication">More</a>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>
