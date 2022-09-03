<div class="sharing social">
  <div class="sharing-upper">
    <a class="icon-share"></a>
  </div>
  <div class="sharing-lower">
    <a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&amp;body=<?php echo urlencode(get_permalink()); ?>" class="icon-mail"><span></span></a>
    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&amp;text=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="icon-twitter"><span></span></a>
    <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode(get_permalink()); ?>&amp;title=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="icon-linkedin"><span></span></a>
    <a href="whatsapp://send?text=<?php echo urlencode(get_the_title().' - '.get_bloginfo('name')); ?> - <?php echo urlencode(get_permalink()); ?>" target="_blank" class="icon-whatsapp"></a>
  </div>
</div>
