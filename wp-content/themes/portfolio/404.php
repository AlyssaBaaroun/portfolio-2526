<?php get_header(); ?>

<section class="error-page">
<h2 class="sro"><?= __hepl('Page erreur de navigation')?></h2>
    <div class="error-page__svg-404">
        <svg class="error-page__404">
            <use xlink:href="#page404"></use>
        </svg>
    </div>

    <h3 class="error-page__title"><?= __hepl('Enquête échouée &nbsp;!
        Aucune trace de cette page...') ?></h3>
    <a
            class="error-page__btn-acc"
            href="/"
            title="Vers la page d'accueil">

        <?=__hepl('Retourner à l’accueil')?>
    </a>
</section>

<?php get_footer(); ?>
