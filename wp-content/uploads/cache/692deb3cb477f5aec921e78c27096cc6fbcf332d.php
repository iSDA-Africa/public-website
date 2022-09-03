<?php 
$next = get_next_post(); 

global $post;

$related = get_posts( 
  array(
    'post_type' => 'publication',
    'status' => 'publish',
    'category__in' => wp_get_post_categories( $post->ID ), 
    'numberposts'  => 2, 
    'post__not_in' => array( $post->ID ),
    'orderby' => 'rand'
  ) 
);
?>

<div class="pad">
  <article <?php post_class() ?>>
    <?php if(has_post_thumbnail()): ?>
    <div class="article-upper">
      <div class="container-narrow">
        <?php echo the_post_thumbnail('blog-single'); ?>

      </div>
    </div>
    <?php endif; ?>
    <div class="article-lower">
      <div class="container">

        <?php echo $__env->make('partials/sharing', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        
        <div class="container-narrow">
          <div class="post-date">
            <p><?php echo e(get_the_date('jS F Y')); ?></p>
          </div>
          <div class="post-title">
            <h1 class="entry-title"><?php echo get_the_title(); ?></h1>
          </div>
          <div class="post-content">
            <?php the_content() ?>
          </div>
        </div>
      </div>
    </div>
  </article>

  <div class="container-narrow">
    <div class="post-nav">
      <div class="back-to-blog">
        <a class="btn btn-left btn-gradient" href="<?php echo get_permalink(275); ?>"><span><i></i>Back to publications</span></a>
      </div>
      <?php if($next): ?>
      <div class="next-post">
        <a class="btn btn-right btn-gradient" href="<?php echo get_permalink($next->ID); ?>"><span>Next<i></i></span></a>
      </div>
      <?php endif; ?>
    </div>
  </div>

  <?php if($related): ?>
  <div class="container related">
    <h2>RELATED PUBLICATIONS</h2>

    <div class="grid-wrapper grid-wrapper-md">
      <div class="grid grid-2 grid-articles">
        <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php setup_postdata($post); ?>

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
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
</div>

<?php 
$gblock = get_post( 132 );
echo apply_filters( 'the_content', $gblock->post_content );
?>