<?php
// Template Name: Legal notices
?>
<?php get_header(); ?>

<section class="notices">

    <h2 role="heading" aria-level="2" id="title"
        class="notices__title fadeInLeft"><?= esc_html(get_field('title')) ?></h2>
</section>

<section class="notices__content" data-showup="true">
    <h2 role="heading" aria-level="2" id="title-sro" class="sro">Contenu de la section légale</h2>


    <?php if (have_rows('mentions_legales')): ?>

        <?php while (have_rows('mentions_legales')) : the_row(); ?>

            <div data-showup="true">
                <h3 class="notices__sub-title"><?= esc_html(get_sub_field('sub_title')) ?></h3>
                <div class="notices__text">
                    <?= wp_kses_post(get_sub_field('desc')) ?>
                </div>
            </div>

        <?php endwhile; ?>
    <?php endif; ?>
</section>

<?php get_footer(); ?>
