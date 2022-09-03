

<section data-<?php echo e($block['id']); ?> class="<?php echo e($block['classes']); ?> block-faqs">
  <div class="pad">
    <div class="container-narrow">
      <div class="block-title">
        <?php echo get_field('intro'); ?>

      </div>
    </div>
    

    <?php if(get_field('faqs')): ?>
      <ul class="faq-list">
      <?php while(have_rows('faqs')): ?>
        <?php the_row(); ?>

        <li>
          <div class="container">
            <div class="question">
              <p><?php echo get_sub_field('question'); ?></p>
            </div>
          </div>
          <div class="answer">
            <div class="answer-inner">
              <?php if(have_rows('answer')): ?>
                <?php while(have_rows('answer')): ?>
                  <?php the_row(); ?>

                  <?php if(get_row_layout() == 'text'): ?>
                    <div class="container">
                      <div class="answer-pad">
                        <?php echo get_sub_field('text'); ?>

                      </div>
                    </div>
                  <?php elseif(get_row_layout() == 'table'): ?>
                    <?php $table = get_sub_field('table'); ?>

                    <div class="container-wide">
                      <div class="answer-pad">
                        <div class="table-wrapper">
                          <div class="table-desktop">
                            <table border="0">
                              <?php if(!empty($table['header'])): ?>
                                <thead>
                                  <tr>
                                    <?php $__currentLoopData = $table['header']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <th>
                                        <?php echo $th['c']; ?>

                                      </th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </tr>
                                </thead>
                              <?php endif; ?>

                              <tbody>
                                <?php $__currentLoopData = $table['body']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <tr>
                                    <?php $__currentLoopData = $tr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $td): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <td>
                                        <?php echo $td['c']; ?>

                                      </td>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                            </table>
                          </div>

                          <div class="table-mobile">
                            <?php $__currentLoopData = $table['body']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <table border="0">
                                <thead>
                                  <tr>
                                    <th colspan="2">
                                      <?php echo $tr[0]['c']; ?>

                                    </tr>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $c = 0; ?>
                                  <?php $__currentLoopData = $table['header']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $th): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php $c++; ?>
                                    
                                    <?php if($c===1): ?>
                                    <?php continue; ?>
                                    <?php endif; ?>
                                    
                                    <?php if($tr[$c-1]['c'] !== ""): ?>
                                    <tr>
                                      <td>
                                        <?php echo $th['c']; ?>

                                      </td>
                                      <td>
                                        <?php echo $tr[$c-1]['c']; ?>

                                      </td>
                                    </tr>
                                    <?php endif; ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                              </table>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>

                          <?php if(get_sub_field('comment_after_table')): ?>
                          <div class="table-comment">
                            <p><?php echo get_sub_field('comment_after_table'); ?></p>
                          </div>
                          <?php endif; ?>

                        </div>
                      </div>
                    </div>
                  <?php endif; ?>
                <?php endwhile; ?>
              <?php endif; ?>
            </div>
          </div>
        </li>
      <?php endwhile; ?>
      </ul>
    <?php endif; ?>
  </div>
</section>