<?php
// Template Name: mon univers
$profile_pic = get_field('folder_img');

?>
<?php get_header(); ?>
    <section class="header_main ">
        <h2 class="sro"><?= __hepl('Mon univers') ?></h2>
        <article class="header_main__left fadeInLeft ">
            <h2 role="heading" aria-level="2" id="title" class="main-title"><?= esc_html(get_field('author')) ?></h2>
            <h3 class="main-title__sub-title">
                <?= esc_html(get_field('subtitle')) ?>
            </h3>
            <div class="main-title__sub-title__sub-desc">
                <?= wp_kses_post(get_field('description')) ?>
            </div>
        </article>

        <article class="header_main__right folder ">
            <h2 class="sro">Illustrations</h2>
            <figure class="folder__figure">
                <svg  class="folder__red-crea" data-name="folder__red"
                     xmlns="http://www.w3.org/2000/svg"
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
                            'class' => 'folder__img-universe anim-img ',
                            'loading' => 'lazy',
                    ]); ?>
                <?php endif; ?>
                <figcaption class="folder__img-caption">
                    <?= __hepl('Qui est-elle ?') ?>
                </figcaption>

                <svg class="folder__pen">
                    <use xlink:href="#pen"></use>
                </svg>

            </figure>
        </article>
    </section>

    <section class="journey" itemprop="alumniOf" itemscope itemtype="https://schema.org/EducationalOrganization">
        <h2 class="journey__title" data-showup="true"><?= esc_html(get_field('educational_journey')) ?></h2>


        <?php if (have_rows('my_journey')): ?>

            <div class="journey__content">

                <?php while (have_rows('my_journey')) : the_row(); ?>

                    <div class="journey__item" data-showup="true">

                        <h3 class="sro"><?= esc_html(get_sub_field('name')) ?></h3>

                        <dl class="journey__text">
                            <dt><?= esc_html(get_sub_field('year')) ?></dt>
                            <dd itemprop="alumni"><?= esc_html(get_sub_field('location')) ?></dd>
                            <dd><?= esc_html(get_sub_field('name')) ?></dd>
                        </dl>


                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </section>
    <section class="tools">
        <h2 class="tools__title" data-showup="true"><?= esc_html(get_field('tools_title')) ?></h2>

        <article class="tools__desc" data-showup="true">
            <h3 class="sro">Mes différents outils</h3>
            <div class="tools__desc1">
                <?= get_field('my_tools') ?>
            </div>
            <div class="tools__desc2">
                <?= get_field('my_tools_fe') ?>
            </div>

            <div class="tools__desc3">
                <?= get_field('my_tools_ag') ?>
            </div>
        </article>

        <div class="tools__wrapper" data-showup="true">
            <ul class="tools__list">
                <?php if (have_rows('list_tools')): while (have_rows('list_tools')): the_row(); ?>
                    <?php
                    $img_tools = get_sub_field('item_tools');
                    $link_tools = get_sub_field('doc_link');
                    $name_tool = get_sub_field('name_tool');
                    ?>
                    <li class="tools__list-items">
                        <a class="tools__link"
                           href="<?= $link_tools['url'] ?>"
                           title="<?= $link_tools['title'] ?>"
                           target="<?= $link_tools['target'] ?>">

                            <img class="tools__list-img" src="<?= $img_tools['url']; ?>"
                                 alt="<?= $img_tools['alt']; ?>">
                            <span class="tools__list-name">
                                <?= $name_tool ?>
                            </span>
                        </a>
                    </li>
                <?php endwhile; endif; ?>
            </ul>


            <ul class="tools__list" aria-hidden="true">
                <?php if (have_rows('list_tools')): while (have_rows('list_tools')): the_row(); ?>
                    <?php
                    $img_tools = get_sub_field('item_tools');
                    $link_tools = get_sub_field('doc_link');
                    $name_tool = get_sub_field('name_tool');
                    ?>
                    <li class="tools__list-items">
                        <a class="tools__link"
                           href="<?= $link_tools['url'] ?>"
                           title="<?= $link_tools['title'] ?>"
                           target="<?= $link_tools['target'] ?>">

                            <img class="tools__list-img" src="<?= $img_tools['url']; ?>"
                                 alt="<?= $img_tools['alt']; ?>">

                            <span class="tools__list-name">
                                <?= $name_tool ?>
                            </span>
                        </a>
                    </li>
                <?php endwhile; endif; ?>
            </ul>
        </div>
    </section>
<?php get_footer(); ?>