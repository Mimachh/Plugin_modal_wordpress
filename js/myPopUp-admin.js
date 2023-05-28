


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

        const submitButton = document.querySelector('.mpu_submit');
        
        submitButton.addEventListener('click', function () {
            const data = {
                status: 'publish',
                'mpu_post_title': mpuTitle.value,
                'mpu_activate': mpuActivate.checked ? '1' : '0',
                'mpu_is_all_pages': mpuIsAllPages.checked ? '1' : '0',
                'mpu_is_except': Array.from(mpuIsExcept).filter(input => input.checked).map(input => input.value),
                'mpu_is_include': Array.from(mpuIsInclude).filter(input => input.checked).map(input => input.value),
                'mpu_is_all_articles': mpuIsAllArticles.value
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