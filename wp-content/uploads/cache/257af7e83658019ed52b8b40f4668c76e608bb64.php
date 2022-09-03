

<?php
$the_query = new WP_Query(
  array(
    'post_type' => 'publication',
    'status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 3
  )
);
?>

<?php if($the_query->have_posts()): ?>
<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> bg-grey-light block-latest-publications">
  <div class="pad">
    <div class="container">
      <div class="section-heading">
        <h1>Publications</h1>
        <div class="grid-wrapper">
          <div class="grid grid-2">
            <div class="cell">
              <div>
                <?php echo get_field('intro'); ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="grid-wrapper grid-wrapper-md">
        <div class="grid grid-articles">
          <?php while($the_query->have_posts()): ?>
            <?php $the_query->the_post(); ?>

            <div class="cell">
              <div>
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
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
      <div class="view-all">
        <a class="btn btn-right btn-gradient" href="<?php echo get_permalink(275); ?>"><span>View all<i></i></span></a>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
