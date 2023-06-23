document.addEventListener('DOMContentLoaded', function (event) {

    // Options supp

    // Cacher la selection du son comme pour les images 
    // Nettoyer lorsqu'il est caché


    
    // Is sound opening
    const mpuIsSoundOnOpen = document.querySelector('.mpu_is_sound_on_open');
    // Sound opening
    // Récupérer l'élément <audio> pour afficher le lecteur audio
    const audioOpenElement = document.querySelector('.sound_opening_preview');


    // Balise Audio cachée si pas de son
    if (audioOpenElement && audioOpenElement.src != "") {
        audioOpenElement.style.display = 'block'; // ou autre style pour l'afficher
    } else if (audioOpenElement && audioOpenElement.src === "") {
        audioOpenElement.style.display = 'none'; // pour la masquer
    }

    // Cacher et nettoyer la balise si unchecked
    const mpuOpeningSoundDivHideByDefault = document.querySelector('#mpuOpeningSoundDivHideByDefault');

    if (mpuOpeningSoundDivHideByDefault && !mpuIsSoundOnOpen.checked) {
        hideSoundButtonAndFieldGroup(mpuOpeningSoundDivHideByDefault);
    }

    if(mpuIsSoundOnOpen) {
        mpuIsSoundOnOpen.addEventListener('change', function () {
            if(mpuIsSoundOnOpen.checked) {
                showElementGroup(mpuOpeningSoundDivHideByDefault);
            } else {
                hideSoundButtonAndFieldGroup(
                    mpuOpeningSoundDivHideByDefault,
                    '.sound_opening_preview'
                );
            }
        });
    }




    // SOUND CLOSING
    // Is sound closing
    const mpuIsSoundOnClosing = document.querySelector('.mpu_is_sound_on_closing');
    // Sound opening
    // Récupérer l'élément <audio> pour afficher le lecteur audio
    const audioCloseElement = document.querySelector('.sound_closing_preview');

    if (audioCloseElement && audioCloseElement.src != "") {
        audioCloseElement.style.display = 'block'; // ou autre style pour l'afficher
    } else if (audioCloseElement && audioCloseElement.src === "") {
        audioCloseElement.style.display = 'none'; // pour la masquer
    }

    // Cacher et nettoyer la balise si unchecked
    const mpuClosingSoundDivHideByDefault = document.querySelector('#mpuClosingSoundDivHideByDefault');
    
    if (mpuClosingSoundDivHideByDefault && !mpuIsSoundOnClosing.checked) {
        hideSoundButtonAndFieldGroup(mpuClosingSoundDivHideByDefault);
    }

    if(mpuIsSoundOnClosing) {
        mpuIsSoundOnClosing.addEventListener('change', function () {
            if(mpuIsSoundOnClosing.checked) {
                showElementGroup(mpuClosingSoundDivHideByDefault);
            } else {
                hideSoundButtonAndFieldGroup(
                    mpuClosingSoundDivHideByDefault,
                    '.sound_closing_preview'
                );
            }
        });
    }

})