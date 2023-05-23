<?php
function myPopUp_main_page_html()
{
?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <h2>Bienvenue sur la configuration de myPopUp</h2>
        <div class="notification is-primary">
            <p>Ce plugin vous permet de créer et afficher des pop-ups sur votre site WordPress.</p>
        </div>
        <div class="notification is-warning">
            <p><strong>Note :</strong> myPopUp propose une version gratuite avec des fonctionnalités de base. Pour accéder à des fonctionnalités avancées telles que des modèles de pop-ups prédéfinis, des intégrations avec des services de marketing et une assistance premium, envisagez de passer à la version payante.</p>
            <p>Visitez notre site web pour en savoir plus sur les fonctionnalités de la version payante et pour obtenir votre licence.</p>
            <a href="https://www.mon-site.com/my-popup-pro" class="button is-primary" target="_blank">Découvrir la version payante</a>
        </div>
        <div class="notification">
            <p>Commencez par configurer les options du plugin dans le menu ci-dessous.</p>
        </div>
    </div>

    <a href="<?php echo admin_url('admin.php?page=myPopUp-options'); ?>">ojokz</a>
    </div>
<?php
}
