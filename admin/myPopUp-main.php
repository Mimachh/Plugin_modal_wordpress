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
            <div class="mpu_notification">
                <h2>Ce plugin vous permet de créer et afficher des pop-ups sur votre site WordPress.</h2>
            </div>

            <div class="informative_message">
                <p class=""><strong>Note : myPopUp est un plugin gratuit avec des fonctionnalités de base.</strong></p>
                <p class="">Pour accéder à des fonctionnalités avancées telles que des modèles de pop-ups prédéfinis, des intégrations avec des services de marketing et une assistance premium, vous pouvez envisager de passer à la version payante.</p>
                <p class="">Visitez notre site web pour en savoir plus sur les fonctionnalités de la version payante et pour obtenir votre licence.</p>
                <a href="https://www.mon-site.com/my-popup-pro" class="mpu_button_admin_lg" target="_blank">Découvrir la version payante</a>
            </div>

            <div class="mpu_thanks">
                <p>Merci d'utiliser ce plugin pour la création de vos Pop-Ups.</p>
                <p>Commencez par configurer les options du plugin en cliquant sur le lien ci-dessous.</p>
            </div>
            <div class="mpu_button_container">
                <a href=<?php echo admin_url('admin.php?page=myPopUp-options'); ?> class="mpu_button_admin_md" value="Redirection">Configurer les options</a>
            </div>



        </div>
        <?php display_mpu_shortcode_posts(); ?>
    </div>

<?php
}
