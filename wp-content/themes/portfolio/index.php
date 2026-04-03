<?php if (have_posts()) : while (have_posts()): the_post(); ?>
    <?= get_the_title(); ?>
    <?= get_the_content(); ?>
<?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
