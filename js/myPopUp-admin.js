


document.addEventListener('DOMContentLoaded', function(event) {

        // Titre du shortcode
        const mpuTitle = document.querySelector('.mpu_post_title');

        // Message d'erreur
        const errorMessage = document.querySelector('.mpu_title-error-message');
        
        //   Activation fields
        const mpuActivate = document.querySelector('.mpu_activate');
        const mpuIsAllArticles = document.querySelector('.mpu_is_all_articles');
        const mpuIsAllPages = document.querySelector('.mpu_is_all_pages');
        const mpuIsExcept = document.querySelectorAll('.mpu_is_except');
        const mpuIsInclude = document.querySelectorAll('.mpu_is_include');
        
        // Les div qui apparaissent et disparaissent
        const mpuIsExceptDiv = document.querySelector('.mpu_exclure_div');
        const mpuIsIncludeDiv = document.querySelector('.mpu_inclure_div');

        // Par défaut sur toutes les pages est décoché
        mpuIsAllPages.checked = false;
        // Cacher le groupe de div "Except" par défaut
        hideElementGroup(mpuIsExceptDiv);
        // Afficher le groupe de div "Inclure" par défaut
        showElementGroup(mpuIsIncludeDiv);

        // Fonction pour cacher un groupe de div
        function hideElementGroup(element) {
            element.style.display = 'none';
            clearInputs(element);
        }
        
        // Fonction pour afficher un groupe de div
        function showElementGroup(element) {
            element.style.display = 'block';
        }

        function clearInputs(element) {
            const checkboxes = element.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });
        }

        // Gestionnaire d'événements pour l'option "Afficher sur toutes les pages"
        mpuIsAllPages.addEventListener('change', function() {
            if (mpuIsAllPages.checked) {
                // Si l'option est cochée, cacher le groupe de div "Inclure" et vider ses valeurs
                hideElementGroup(mpuIsIncludeDiv);
                showElementGroup(mpuIsExceptDiv);
            } else {
                // Si l'option n'est pas cochée, cacher le groupe de div "Except" et vider ses valeurs
                hideElementGroup(mpuIsExceptDiv);
                // Afficher le groupe de div "Inclure"
                showElementGroup(mpuIsIncludeDiv);
            }
        });


        // ----------------------------- VISUEL ----------------------------- //

        const mpuAddSiteLogo = document.querySelector('.mpu_add_site_logo');
        // Pas encore fait
        const mpuCustomLogo = document.querySelector('.mpu_custom_logo');
        //

        const mpuIsTitleVisible = document.querySelector('.mpu_is_title_visible');
        const mpuHeaderTitle = document.querySelector('.mpu_header_title');
        const mpuIsBodyContentVisible = document.querySelector('.mpu_is_body_content_visible');
        const mpuBodyContent = document.querySelector('.mpu_body_content');
        const mpuIsDescriptionVisible = document.querySelector('.mpu_is_description_visible');
        const mpuDescription = document.querySelector('.mpu_description');
        const mpuOverlay = document.querySelector('.mpu_overlay');
        const mpuOverlayOpacityValue = document.querySelector('.mpu_overlay_opacity_value');
        const mpuOverlayColor = document.querySelector('.mpu_overlay_color');
        const mpuOverlayBlurValue = document.querySelector('.mpu_overlay_blur_value');
        const mpuIsAuthorVisible = document.querySelector('.mpu_is_author_visible');
        const mpuTemplateChoice = document.querySelector('.mpu_template_choice');

        const mpuIsDesktopFullScreen = document.querySelector('.mpu_is_desktop_full_screen');
        const mpuDesktopMinWidth = document.querySelector('.mpu_desktop_min_width');
        const mpuDesktopMaxWidth = document.querySelector('.mpu_desktop_max_width');
        const mpuDesktopMinHeight = document.querySelector('.mpu_desktop_min_height');
        const mpuDesktopMaxHeight = document.querySelector('.mpu_desktop_max_height');

        const mpuIsMobileFullScreen = document.querySelector('.mpu_is_mobile_full_screen');
        const mpuMobileMinWidth = document.querySelector('.mpu_mobile_min_width');
        const mpuMobileMaxWidth = document.querySelector('.mpu_mobile_max_width');
        const mpuMobileMinHeight = document.querySelector('.mpu_mobile_min_height');
        const mpuMobileMaxHeight = document.querySelector('.mpu_mobile_max_height');


        const submitButton = document.querySelector('.mpu_submit');
       
        submitButton.addEventListener('click', function () {
            const data = {
                status: 'publish',
                'mpu_post_title': mpuTitle.value,
                'mpu_activate': mpuActivate.checked ? '1' : '0',
                'mpu_is_all_pages': mpuIsAllPages.checked ? '1' : '0',
                'mpu_is_except': Array.from(mpuIsExcept).filter(input => input.checked).map(input => input.value),
                'mpu_is_include': Array.from(mpuIsInclude).filter(input => input.checked).map(input => input.value),
                'mpu_is_all_articles': mpuIsAllArticles.checked ? '1' : '0',
                
                // Visuel
                'mpu_add_site_logo' : mpuAddSiteLogo.checked ? true : '0',
                'mpu_is_title_visible' : mpuIsTitleVisible.checked ? true : '0',
                'mpu_header_title': mpuHeaderTitle.value,
                'mpu_is_body_content_visible' : mpuIsBodyContentVisible.checked ? true : '0',
                'mpu_body_content': mpuBodyContent.value,
                'mpu_is_description_visible' : mpuIsDescriptionVisible.checked ? true : '0',
                'mpu_description': mpuDescription.value,
                'mpu_overlay': mpuOverlay.value,
                'mpu_overlay_opacity_value': mpuOverlayOpacityValue.value,
                'mpu_overlay_color': mpuOverlayColor.value,
                'mpu_overlay_blur_value': mpuOverlayBlurValue.value,
                'mpu_is_author_visible' : mpuIsAuthorVisible.checked ? true : '0',
                'mpu_template_choice': mpuTemplateChoice.value,
                
                'mpu_is_desktop_full_screen' : mpuIsDesktopFullScreen.checked ? true : '0',
                'mpu_desktop_min_width': mpuDesktopMinWidth.value,
                'mpu_desktop_max_width': mpuDesktopMaxWidth.value,
                'mpu_desktop_min_height': mpuDesktopMinHeight.value,
                'mpu_desktop_max_height': mpuDesktopMaxHeight.value,

                'mpu_is_mobile_full_screen' : mpuIsMobileFullScreen.checked ? true : '0',
                'mpu_mobile_min_width': mpuMobileMinWidth.value,
                'mpu_mobile_max_width': mpuMobileMaxWidth.value,
                'mpu_mobile_min_height': mpuMobileMinHeight.value,
                'mpu_mobile_max_height': mpuMobileMaxHeight.value,
            };

            
            // Vérification du titre
            if (mpuTitle.value.trim() === '') {
                errorMessage.textContent = 'Le titre est obligatoire';
                errorMessage.style.display = 'block';
                return; 
            }
        
            const xhr = new XMLHttpRequest();
            xhr.open(
            'POST',
            siteData.root_url + '/wp-json/mpu-shortcodes/v1/manageShortcodes'
            );
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-WP-Nonce', siteData.nonce);
        
            xhr.onload = function () {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                console.log('Bien ouej');
                console.log(response);
                
                if (response.data == 'Existe déjà') {
                    errorMessage.style.display = 'block';
                    errorMessage.textContent = 'Le titre existe déjà.';
                }
                // Réinitialisation des champs
                mpuTitle.value ="";
            } else {
                const response = JSON.parse(xhr.responseText);
                console.log('Dommage');
                console.log(response.message);
            }
            };
        
            xhr.send(JSON.stringify(data));
        });

   
});

// Autre bouton pour le edit des formulaires