window.onload = (event) => {
    var customField = document.querySelector('.custom-field');
    var submitButton = document.querySelector('.submit');

    submitButton.addEventListener('click', function() {
        var data = {
            'custom-field': customField.value,
            'status': 'publish'
        };

        var xhr = new XMLHttpRequest();
        xhr.open('POST', siteData.root_url + '/wp-json/mpu-shortcodes/v1/manageShortcodes');
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-WP-Nonce', siteData.nonce);

        xhr.onload = function() {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                console.log('Bien ouej');
                console.log(response);

                // Réinitialisation des champs
                document.querySelector('.custom-field').value = '';

            } else {
                console.log('Dommage');
                console.log(xhr.responseText);
            }
        };

        xhr.send(JSON.stringify(data));
    });

};

