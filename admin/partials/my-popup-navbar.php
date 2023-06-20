<?php

function myPopUp_navbar()
{
?>
    <div class="mpu-main-navbar">
        <nav class="mpu-navbar" role="navigation" aria-label="mpu_main_navigation">
            <div class="navbar-brand mpu-navbar-brand">
                <a class="navbar-item mpu-navbar-logo" href=""><img src='<?php echo plugins_url('assets/logos/LogoMyPopUp.png', dirname(__FILE__)); ?>' alt="MyPopUp Logo" class="myPopUp-logo"></a>
            </div>
        </nav>
    </div>
<?php
}
