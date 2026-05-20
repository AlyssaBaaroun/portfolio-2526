<?php
get_header();

$args = [
        'post_type' => 'projects',
        'order' => 'DESC',
        'posts_per_page' => 2,
        'post__not_in' => [get_the_ID()],

];
$projects = new WP_Query($args);


?>
<section class="title-page fadeInLeft">

    <h2><?= get_the_title(); ?></h2>

</section>


<?php
if (have_rows('projects')): while (have_rows('projects')) : the_row();
    $title = get_sub_field('desc_title');
    $text = get_sub_field('desc_project');
    $img = get_sub_field('project_img');
    ?>

    <section class="project">
        <h2 class="sro"><?= __hepl('Explication du projet') ?></h2>

        <article class="project__infos" data-showup="true">
            <h3 class="project__title"><?= $title ?></h3>
            <div class="project__paragraphe"><?= $text ?></div>
        </article>


        <?php if (!empty($img)): ?>
            <div class="project__container" data-showup="true">
                <img
                        class="project__container-img"
                        src="<?= esc_url($img['url']); ?>"
                        alt="<?= esc_attr($img['alt']); ?>"
                        loading="lazy"
                >
            </div>
        <?php endif; ?>
    </section>
<?php
endwhile; endif;
?>

<div class="project-link">
    <a class="project-link__btn" data-showup="true" href="<?= get_field('link_to_site')['url'] ?>"
       title="<?= __hepl('lien vers le projet') ?>"
       target="_blank"><?= get_field('link_to_site')['title'] ?></a>
</div>

<section class="project-card" data-showup="true">
    <h2 class="project-card__sub-title" data-showup="true"><?= __hepl('Autres projets') ?></h2>
    <div class="project-card__grid">
        <?php if ($projects->have_posts()) : while ($projects->have_posts()): $projects->the_post(); ?>
            <article class="project-card__content" itemscope itemtype="https://schema.org/CreativeWork">
                <h3 class="sro" itemprop="headline"> <?= get_the_title() ?></h3>

                <?php $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'square-medium'); ?>

                <div class="project-card__item" data-showup="true">
                    <svg class="project-card__pin"
                         xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 22.89 74.99">
                        <path d="M19.63,52.31c-.26-9.92-.17-19.9-.73-29.81-.55-9.56-14.67-8.6-15.11.65-.47,9.68.5,19.59.73,29.27.03,1.48,2.32,1.43,2.29-.07-.2-7.9-.38-15.77-.58-23.65-.05-2.17-.53-4.79.02-6.94,1.41-5.52,9.96-4.89,10.37.78.53,7.67.38,15.44.58,23.11.17,6.81.81,13.8.52,20.58-.3,6.33-8.88,8.66-12.74,3.56-1.23-1.62-1.21-2.82-1.26-4.65-.2-8.44-.43-16.86-.63-25.29-.2-8.44-.43-16.86-.63-25.29-.1-3.56-.13-7.51,2.71-10.13,3.21-2.98,9.1-2.77,12.28.08,2.86,2.57,3.33,7.55,3.33,12.24.66-.1,1.42-.15,2.13-.1.03-4.89-.22-10.2-3.58-13.53C16.42.26,11.62-.66,7.76.46,2.76,1.89.36,6.44.11,11.39c-.39,8.08.36,16.35.56,24.43.25,10.04.16,20.19.74,30.21.46,7.84,11.41,12.38,16.77,5.8,1.59-1.94,1.82-4.26,1.79-6.65-.04-4.3-.22-8.58-.32-12.88h0l-.02.02Z"
                              style="fill: #676767;"/>
                    </svg>


                    <div class="project-card__back-dark"></div>
                    <div class="project-card__back-red"></div>

                    <figure class="project-card__img-content" itemprop="workExample">
                        <a href="<?= get_permalink(); ?>"
                           title="lien vers le projet : <?= esc_attr(get_the_title()) ?>">
                            <?php if ($thumbnail): ?>
                                <img class="img-pic"
                                     srcset="<?= esc_url($thumbnail); ?>"
                                     alt="<?= esc_attr(get_the_title()); ?>">
                            <?php endif; ?>
                        </a>
                        <figcaption
                                class="project-card__title-cards"><?= get_the_title(); ?>
                        </figcaption>
                    </figure>
                </div>
            </article>
        <?php endwhile;
            wp_reset_postdata();
        else: ?>
            <p> Aucun projet </p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
