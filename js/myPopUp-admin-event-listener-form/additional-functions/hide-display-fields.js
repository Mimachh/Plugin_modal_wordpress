
// ----------------------------- CHECKBOXES ------------------------------ //

  // Fonction pour cacher un groupe de div qui contient des checkboxes
  function hideElementCheckboxGroup(element) {
    element.style.display = 'none';
    clearCheckboxInputs(element);
  }
// Fonction pour nettoyer des checkboxes
  function clearCheckboxInputs(element) {
    const checkboxes = element.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(function (checkbox) {
      checkbox.checked = false;
    });
  }

// ----------------------------- IMAGE ------------------------------ //

//   Fonction qui cache le bouton de l'image custom logo 
function hideImageButtonAndFieldGroup(element, imgPreview) {
    element.style.display = 'none';
    
    if (imgPreview) {
      clearImagePreview(imgPreview);
    }
}

// On clear l'image qui est dedans lorsqu'on ferme un switch
  function clearImagePreview(element) {
    const imagePreview = document.querySelector(element);
    // console.log(element);
    imagePreview.src = ''; // Efface l'URL de l'image
    imagePreview.alt = "Aperçu de l'imagsssssse"; // Rétablit le texte alternatif de l'image
  
    imagePreview.removeEventListener('error', errorHandler);
  }
// Pour éviter d'avoir le alt après avoir nettoyé on utilise un handler qui ne s'active qu'en cas réel d'erreur  
  function errorHandler() {
    const imagePreview = this;
    imagePreview.src = '';
    imagePreview.alt = "Erreur de chargement de l'image";
  }
  

// ------------------------------ SOUND ----------------------------------- //
function hideSoundButtonAndFieldGroup(element, soundPreview) {
  element.style.display = 'none'; 
}

// ----------------------------- TEXT FIELD ------------------------------ //

  // Fonctions pour gérer un groupe a cacher avec un texte field dedans
  function hideTextFieldElementGroup(element, ...toDeleteSelectors) {
    element.style.display = 'none';
    clearInputText(...toDeleteSelectors);
  }
  
  function clearInputText(...toDeleteSelectors) {
    toDeleteSelectors.forEach(selector => {
      const textField = document.querySelector(selector);
      if (textField) {
        textField.value = '';
      }
    });
  }
  // Pour select
  function clearInputSelect(...toDeleteSelectors) {
    toDeleteSelectors.forEach(selector => {
      const inputElement = document.querySelector(selector);
      if (inputElement) {
        if (inputElement.tagName === 'SELECT') {
          inputElement.selectedIndex = 0; // Réinitialiser la sélection à l'option par défaut
        } else {
          inputElement.value = ''; // Réinitialiser la valeur du champ de saisie
        }
      }
    });
  }
  
  // Fonction pour afficher un groupe de div -> marche pour tout
  function showElementGroup(element) {
    element.style.display = 'block';
  }

  function showElementGroupWithFlex(element) {
    element.style.display = 'flex';
  }
  

  
  
  
  

  