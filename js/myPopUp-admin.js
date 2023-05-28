


document.addEventListener('DOMContentLoaded', function(event) {

        const mpuTitle = document.querySelector('.mpu_post_title');
        const errorMessage = document.querySelector('.mpu_title-error-message');
        //   Activation fields
        const mpuActivate = document.querySelector('.mpu_activate');
            
        const mpuIsAllPages = document.querySelector('.mpu_is_all_pages');
        const mpuIsExcept = document.querySelectorAll('.mpu_is_except');
        const mpuIsInclude = document.querySelectorAll('.mpu_is_include');
        
        
        const submitButton = document.querySelector('.mpu_submit');
        
        submitButton.addEventListener('click', function () {
            const data = {
                status: 'publish',
                'mpu_post_title': mpuTitle.value,
                'mpu_activate': mpuActivate.checked ? '1' : '0',
                'mpu_is_all_pages': mpuIsAllPages.checked ? '1' : '0',
                'mpu_is_except': Array.from(mpuIsExcept).filter(input => input.checked).map(input => input.value),
                'mpu_is_include': Array.from(mpuIsInclude).filter(input => input.checked).map(input => input.value)
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
                // document.querySelector('.custom-field').value = '';
            } else {
                const response = JSON.parse(xhr.responseText);
                console.log('Dommage');
                console.log(response.message);
            }
            };
        
            xhr.send(JSON.stringify(data));
        });

   
  });