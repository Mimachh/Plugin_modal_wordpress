// Cette fonction valide si le Titre du shortcode est vide
function mpuValidateTitle(mpuTitle) {
    if (mpuTitle.value.trim() === '') {
      errorMessage.textContent = 'Le titre est obligatoire';
      errorMessage.style.display = 'block notification is-danger';
      return false; // La validation a échoué
    }
    return true;
  }
  