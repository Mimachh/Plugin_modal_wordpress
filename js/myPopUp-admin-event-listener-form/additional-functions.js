

function mpuValidateTitle(mpuTitle) { 
    if (mpuTitle.value.trim() === '') {
      errorMessage.textContent = 'Le titre est obligatoire';
      errorMessage.style.display = 'block';
      return false; // La validation a échoué
    } 
    return true;
}

// Fonction pour cacher un groupe de div
function hideElementGroup(element) {
    element.style.display = 'none';
    clearCheckboxInputs(element);
}

function hideImageButtonAndFieldGroup(element, imgPreview) {
    element.style.display = 'none';
    if(imgPreview) {
        clearImagePreview(imgPreview);
    }
}
        
// Fonction pour afficher un groupe de div
function showElementGroup(element) {
    element.style.display = 'block';
}

function clearCheckboxInputs(element) {
    const checkboxes = element.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(function(checkbox) {
        checkbox.checked = false;
    });
}

function clearImagePreview(element) {
    const imagePreview = document.querySelector(element);
    console.log(element);
    imagePreview.src = ''; // Efface l'URL de l'image
    imagePreview.alt = 'Aperçu de l\'imagsssssse'; // Rétablit le texte alternatif de l'image
    
    imagePreview.removeEventListener('error', errorHandler);
}

function errorHandler() {
    const imagePreview = this;
    imagePreview.src = '';
    imagePreview.alt = 'Erreur de chargement de l\'image';
}

