<?php

function myPopUp_main_page_html()
{
    require_once dirname(dirname(__FILE__)) . '/admin/partials/my-popup-navbar.php';
?>

    <div class="mpu-wrapper">
        <?php myPopUp_navbar(); ?>
        <div class="wrap">

            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <h2>Bienvenue sur la configuration de myPopUp</h2>
            <div class="notification mt-5">
                <p>Ce plugin vous permet de créer et afficher des pop-ups sur votre site WordPress.</p>
            </div>
            <div class="notification-container">
                <div class="notification is-warning">
                    <p class="is-size-4"><strong>Note : myPopUp est un plugin gratuit avec des fonctionnalités de base.</strong></p>
                    <p class="my-5">Pour accéder à des fonctionnalités avancées telles que des modèles de pop-ups prédéfinis, des intégrations avec des services de marketing et une assistance premium, vous pouvez envisager de passer à la version payante.</p>
                    <p class="mb-5">Visitez notre site web pour en savoir plus sur les fonctionnalités de la version payante et pour obtenir votre licence.</p>
                    <a href="https://www.mon-site.com/my-popup-pro" class="button is-primary" target="_blank">Découvrir la version payante</a>
                </div>
            </div>
            <div class="notification">
                <p>Merci d'utiliser ce plugin pour la création de vos Pop-Ups.</p>
                <p>Commencez par configurer les options du plugin en cliquant sur le lien ci-dessous.</p>

                <a href=<?php echo admin_url('admin.php?page=myPopUp-options'); ?> class="button is-primary my-5" value="Redirection">Configurer les options</a>



            </div>
        </div>
        <?php display_mpu_shortcode_posts(); ?>
    </div>

<?php
}
