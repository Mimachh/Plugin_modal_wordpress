<?php

function myPopUp_navbar()
{
?>
    <div class="mpu-main-navbar"></div>
    <nav class="navbar is-warning" role="navigation" aria-label="mpu_main_navigation">
        <div class="navbar-brand mpu-navbar-brand">
            <a class="navbar-item mpu-navbar-logo" href=""><img src='<?php echo plugins_url('assets/logos/LogoMyPopUp.png', dirname(__FILE__)); ?>' alt="MyPopUp Logo" class="myPopUp-logo"></a>
        </div>
    </nav>
<?php
}
