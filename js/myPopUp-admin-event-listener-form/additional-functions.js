

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