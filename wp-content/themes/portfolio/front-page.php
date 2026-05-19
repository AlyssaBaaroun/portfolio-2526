<?php
get_header();

$btn_discover = get_field('button_link');
$btn_projects = get_field('other_projects');
$profile_pic = get_field('folder_img');

$args = [
        'post_type' => 'projects',
        'order' => 'DESC',
        'posts_per_page' => 3
];

$projects = new WP_Query($args);
?>
<section class="header_main fadeInLeft">
    <h2 class="sro">Alyssa Baaroun</h2>
    <article class="header_main__left ">
        <h2 role="heading" id="title" class="main-title" itemprop="name"><?= esc_html(get_field('author')) ?></h2>
        <h3 class="main-title__sub-title" itemprop="jobTitle"><?= esc_html(get_field('job')) ?></h3>
        <div class="main-title__sub-title__sub-desc" itemprop="description">
            <?= wp_kses_post(get_field('description_job')) ?>
        </div>
        <a class="btn-dicover" href="<?= $btn_discover['url'] ?>"
           title="vers la page me découvrir"><?= esc_html($btn_discover['title']) ?></a>
    </article>


    <article class="header_main__right folder ">
        <h2 class="sro">Illustrations</h2>
        <figure class="folder__figure">

            <svg id="folder__red" class="folder__red" data-name="folder__red" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 673.78 830.36">
                <rect x="26.53" y="30.18" width="548.81" height="742.84" style="fill: #d0c8bc;"/>
                <polygon points="514.22 1.89 76.6 0 73.93 625.21 512.92 627.06 514.22 1.89" style="fill: #d0c8bc;"/>
                <polygon points="306.08 340.35 0 393.09 75.38 830.36 382.36 777.42 306.08 340.35"
                         style="fill: #d0cac7;"/>
                <path d="M65.55,202.13v95.15c0,5.82,2.59,11.91,7.51,18.2s12.22,12.77,21.69,19.26h.67v452.24c0,18.35,14.9,33.29,33.21,33.29h545.15V44.14H134.21v.08h-5.5c-18.35,0-33.25,14.9-33.25,33.25v77.35h-.63c-9.47,6.45-16.78,12.97-21.69,19.22-4.95,6.29-7.51,12.42-7.51,18.2v8.14c0,.63-.08,1.26-.08,1.89v-.12Z"
                      style="fill: #61130f;"/>
            </svg>

            <?php if (!empty($profile_pic)): ?>
                <?= wp_get_attachment_image($profile_pic['ID'], 'square-small', false, [
                        'class' => 'folder__img anim-img',
                        'loading' => 'lazy',
                ]); ?>
            <?php endif; ?>

            <svg id="folder__pin" class="folder__pin" data-name="folder__pin" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 22.89 74.99">
                <path d="M19.63,52.31c-.26-9.92-.17-19.9-.73-29.81-.55-9.56-14.67-8.6-15.11.65-.47,9.68.5,19.59.73,29.27.03,1.48,2.32,1.43,2.29-.07-.2-7.9-.38-15.77-.58-23.65-.05-2.17-.53-4.79.02-6.94,1.41-5.52,9.96-4.89,10.37.78.53,7.67.38,15.44.58,23.11.17,6.81.81,13.8.52,20.58-.3,6.33-8.88,8.66-12.74,3.56-1.23-1.62-1.21-2.82-1.26-4.65-.2-8.44-.43-16.86-.63-25.29-.2-8.44-.43-16.86-.63-25.29-.1-3.56-.13-7.51,2.71-10.13,3.21-2.98,9.1-2.77,12.28.08,2.86,2.57,3.33,7.55,3.33,12.24.66-.1,1.42-.15,2.13-.1.03-4.89-.22-10.2-3.58-13.53C16.42.26,11.62-.66,7.76.46,2.76,1.89.36,6.44.11,11.39c-.39,8.08.36,16.35.56,24.43.25,10.04.16,20.19.74,30.21.46,7.84,11.41,12.38,16.77,5.8,1.59-1.94,1.82-4.26,1.79-6.65-.04-4.3-.22-8.58-.32-12.88h0l-.02.02Z"
                      style="fill: #676767;"/>
            </svg>

        </figure>
    </article>
</section>

<section class="project-card ">
    <h2 class="project-card__sub-title fadeInLeft"><?= esc_html(get_field('projects_sub_title')) ?></h2>
    <div class="project-card__grid">


        <?php if ($projects->have_posts()) : while ($projects->have_posts()): $projects->the_post(); ?>
            <article class="project-card__content-fp" itemscope itemtype="https://schema.org/CreativeWork">
                <h3 class="sro"><?php echo esc_html(get_the_title()); ?></h3>
                <?php $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'square-medium'); ?>

                <div class="project-card__item" data-showup="true">
                    <svg id="project-card__pin" class="project-card__pin" data-name="project-card__pin"
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
    <a
            class="btn-projects" data-showup="true"
            href="<?= $btn_projects['url'] ?>"
            title="vers la page de mes projets">

        <?= esc_html($btn_projects['title']) ?>
    </a>
</section>

<?php get_footer(); ?>
