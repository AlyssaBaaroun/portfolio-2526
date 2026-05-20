<?php
// Template Name: Créations
$terms = get_terms('project_type');
$taxonomy = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';

$args = [
        'post_type' => 'projects',
        'posts_per_page' => -1 // tous mes projets
];

if ($taxonomy !== '') {
    $args['tax_query'] = [
            [
                    'taxonomy' => 'project_type',
                    'field' => 'slug',
                    'terms' => $taxonomy,
            ]

    ];
}

$projects = new WP_Query($args);
$title = get_field('my_creations');
?>

<?php get_header(); ?>

<section class="header-creation">
    <h2 role="heading" aria-level="2" class="header-creation__title fadeInLeft">
        <?= get_the_title() ?>
    </h2>


    <nav class="creation-filter" aria-label="filtrer tout mes projets">
        <h2 class="sro"><?= __hepl('Filtres de mes projets') ?></h2>
        <ul class="creation-filter__list">
            <li class="creation-filter__item">
                <a class="creation-filter__link" href="/mes-creations">
                    <?= __hepl('TOUT') ?>
                </a>
            </li>
            <?php foreach ($terms as $term): ?>
                <li class="creation-filter__item">
                    <a class="creation-filter__link" href="/mes-creations?filter=<?= $term->slug ?>">
                        <?= $term->name; ?>
                    </a>
                </li>
            <?php endforeach; ?>

        </ul>
    </nav>
    <div class="creation__wrapper">
        <section class="project-card ">
            <h2 class="sro"><?= __hepl('Mes projets') ?></h2>
            <div class="project-card__grid">


                <?php if ($projects->have_posts()) : while ($projects->have_posts()): $projects->the_post(); ?>
                    <article class="project-card__content" itemscope itemtype="https://schema.org/CreativeWork">
                        <h3 class="sro"><?php echo esc_html(get_the_title()); ?></h3>


                        <?php $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'square-medium'); ?>

                        <div class="project-card__item " data-showup="true">
                            <svg class="project-card__pin" data-name="project-card__pin"
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
    </div>
</section>
<?php get_footer(); ?>
