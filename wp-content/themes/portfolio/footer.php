<?php
$social_media = portfolio_get_navigation_links('social-media');
$ressources = portfolio_get_navigation_links('ressources');
$footer = portfolio_get_navigation_links('footer');
?>
</main>
<footer class="footer">
    <div class="footer__container">
        <h2 class="sro">Footer</h2>
        <div class="footer__top">
            <div class="footer__svg-loop">
                <svg class="footer__loop">
                    <use xlink:href="#loop"></use>
                </svg>
            </div>
            <nav class="footer__nav" aria-labelledby="footer-nav-title">
                <h3 class="footer__title" id="footer-nav-title">Navigation</h3>
                <ul class="footer__list">
                    <?php foreach ($footer as $link) : ?>
                        <li class="footer__item">
                            <a class="footer__link" href="<?= $link->href ?>"><?= $link->label ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
            <aside class="footer__infos">
                <h3 class="footer__title"><?= __hepl('Ressources') ?></h3>
                <ul class="footer__list">
                    <?php foreach ($ressources as $link) : ?>
                        <li class="footer__item">
                            <a class="footer__link"
                               target="_blank"
                               href="<?= $link->href ?>"
                               title="<?= $link->label ?>">
                                <?= $link->label ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </aside>
            <aside class="footer__utils">
                <h3 class="footer__title"><?= __hepl('Retrouvez-moi') ?></h3>
                <ul class="footer__list">
                    <?php foreach ($social_media as $link) : ?>
                        <li class="footer__item">
                            <a class="footer__link"
                               target="_blank"
                               itemprop="sameAs"
                               href="<?= $link->href ?>"
                               title="<?= $link->label ?>">
                                <?= $link->label ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </aside>
        </div>
        <div class="footer__bottom">
            <p class="footer__copyright">
                <strong>© 2026 </strong><?= __hepl(' Alyssa Baaroun. Tous droits réservés.') ?>
            </p>
            <ul class="footer__legal">
                <li class="footer__legal-item">
                    <a class="footer__legal-link"
                       href="<?= __hepl('/mentions-legales/') ?>"><?= __hepl('Mentions légales') ?></a>
                </li>
            </ul>
        </div>
    </div>
</footer>
</body>
</html>
