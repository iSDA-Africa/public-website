

<?php $link = get_field('link'); ?>

<div class="post-link">
  <a class="arrow-right arrow-right-lg" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?><span><i></i></span></a>
</div>