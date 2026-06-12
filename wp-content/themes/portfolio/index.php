<?php if (have_posts()) : while (have_posts()): the_post(); ?>
    <?= get_the_title(); ?>
    <?= get_the_content(); ?>
<?php endwhile; else: ?>
  <p><?php __hepl('Aucun projet trouvé.'); ?></p>
<?php endif; ?>
