<?php
/*
* Template Name: Contact
*/
?>
<?php get_header(); ?>


<?php
$feedback = hepl_session_get('hepl_contact_form_feedback') ?? false;
$errors = hepl_session_get('hepl_contact_form_errors') ?? [];
?>

<section class="formulaire-contact fadeInLeft ">


    <h2 role="heading" aria-level="2" id="title" class="formulaire-contact__title "><?= esc_html(get_field('contact')) ?>
    </h2>

    <div class="formulaire-contact__container" data-showup="true">


        <article class="formulaire-contact__left" data-showup="true">
            <h3 class="sro">text explicatif du formulaire de contact</h3>
            <p class="formulaire-contact__sub-title"><?= esc_html(get_field('subtitle_contact')) ?></p>
            <?php if ($feedback): ?>
                <p class="formulaire-contact__feedback"><?= __hepl(
                            'Merci !
                         Votre message a bien été envoyé.') ?></p>
            <?php endif; ?>

            <?php if ($errors): ?>
                <p class="formulaire-contact__error-form">

                    <?= __hepl('Attention ! 
Merci de corriger les erreurs du formulaire.') ?></p>
            <?php endif; ?>
        </article>


        <section class="formulaire-contact__right" data-showup="true">
            <h3 class="sro">Formulaire de contact</h3>

            <div class="formulaire-contact__back-red">

                <form class="form" action="<?= esc_url(admin_url('admin-post.php')); ?>" method="post">

                    <div class="form__pin-form">
                        <svg class="form__pin">
                            <use xlink:href="#pin-form"></use>
                        </svg>
                    </div>

                    <fieldset class="form__champs">
                        <legend class="sro"><?= __hepl('Formulaire de contact') ?></legend>
                        <div class="field name">
                            <label class="form__label" for="name"><?= __hepl('Nom *') ?></label>
                            <input class="form__input" type="text" id="name" name="name" placeholder="Ex: Morgan">
                            <?php if ($errors['name'] ?? null) : ?>
                                <p class="form__error"><?= $errors['name']; ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="field lastname">
                            <label class="form__label" for="last_name"><?= __hepl('Prénom *') ?></label>
                            <input class="form__input" type="text" id="last_name" name="last_name"
                                   placeholder="Ex: Derek">
                            <?php if ($errors['last_name'] ?? null) : ?>
                                <p class="form__error"><?= $errors['last_name']; ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="field email">
                            <label class="form__label" for="email"><?= __hepl('Adresse mail *') ?></label>
                            <input class="form__input" type="email" id="email" name="email"
                                   placeholder="Ex: morganderek@gmail.com">
                            <?php if ($errors['email'] ?? null) : ?>
                                <p class="form__error"><?= $errors['email']; ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="field message">
                            <label class="form__label" for="message"><?= __hepl('Message *') ?></label>
                            <textarea class="form__textarea" id="message" name="message" cols="30" rows="5"
                                      placeholder="<?= __hepl('Écrivez votre message ici...') ?>"></textarea>
                            <?php if ($errors['message'] ?? null) : ?>
                                <p class="form__error"><?= $errors['message']; ?></p>
                            <?php endif; ?>
                        </div>

                        <p class="form__required-note"><?= __hepl('Les champs avec (*) sont à compléter obligatoirement !') ?></p>

                        <input type="hidden" name="action" value="hepl_contact_form"/>
                        <input type="hidden" name="contact_nonce" value="<?= wp_create_nonce('hepl_contact_form'); ?>"/>

                    </fieldset>
                    <button class="submit" type="submit"><?= __hepl('Envoyer') ?></button>
                </form>
            </div>
        </section>
    </div>
</section>


<?php get_footer(); ?>
