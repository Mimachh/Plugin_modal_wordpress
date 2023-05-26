window.onload = (event) => {
  const customField = document.querySelector('.custom-field');
  const submitButton = document.querySelector('.submit');

  submitButton.addEventListener('click', function () {
    const data = {
      'custom-field': customField.value,
      status: 'publish',
    };

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
