document.addEventListener('DOMContentLoaded', function (event) {
  // ----------------------------- ACTIVATION ----------------------------- //
  // Titre du shortcode
  const mpuTitle = document.querySelector('.mpu_post_title');

  // Message d'erreur
  const errorMessage = document.querySelector('.mpu_title-error-message');

  //   Activation fields
  const mpuActivate = document.querySelector('.mpu_activate');
  const mpuIsAllArticles = document.querySelector('.mpu_is_all_articles');
  const mpuIsAllPages = document.querySelector('.mpu_is_all_pages');
  const mpuIsExcept = document.querySelectorAll('.mpu_is_except');

 

  // ----------------------------- VISUEL ----------------------------- //

  const mpuCustomLogoMediaOpen = document.querySelector(
    '.mpu_custom_logo_media_open'
  );
 let mpuCustomLogoPreview = document.querySelector(
    '.mpu_custom_logo_preview'
  );
  const mpuAddSiteLogo = document.querySelector('.mpu_add_site_logo');


  let mpuCustomLogoRelativePath = '';

 
  if(mpuCustomLogoMediaOpen) {
    mpuCustomLogoMediaOpen.addEventListener('click', function (event) {
      event.preventDefault();

      // Ouvrir la médiathèque WordPress
      const mediaUploader = wp.media({
        title: 'Sélectionnez une image',
        button: {
          text: 'Insérer',
        },
        multiple: false, // Changer à true pour permettre la sélection de plusieurs fichiers
      });

      // Lorsqu'un ou plusieurs fichiers sont sélectionnés
      mediaUploader.on('select', function () {
        const attachment = mediaUploader
          .state()
          .get('selection')
          .first()
          .toJSON();

        // Récupérer l'URL de l'image sélectionnée
        const imageUrl = attachment.url;

        // Récupérer le chemin relatif de l'image
        mpuCustomLogoRelativePath = imageUrl.replace(siteData.root_url, '');

        // Mettre à jour l'attribut src de l'élément <img> avec l'URL de l'image sélectionnée en chemin relatif
        mpuCustomLogoPreview.src = mpuCustomLogoRelativePath;

        
      });

      // Ouvrir la fenêtre modale de la médiathèque
      mediaUploader.open();
    });
  }
  if(mpuCustomLogoPreview) {
    // Listener pour supprimer le message d'erreur en cas de clear après activation/désactivation du bouton. La fonction est dans additional-functions.js
    mpuCustomLogoPreview.addEventListener('error', errorHandler);
  }
 
  // Modale Title
  const mpuIsTitleVisible = document.querySelector('.mpu_is_title_visible');
  const mpuHeaderTitle = document.querySelector('.mpu_header_title');
  // Modale Content
  const mpuIsBodyContentVisible = document.querySelector(
    '.mpu_is_body_content_visible'
  );
  const mpuBodyContent = document.querySelector('.mpu_body_content');
  // Modale description admin part
  const mpuIsDescriptionVisible = document.querySelector(
    '.mpu_is_description_visible'
  );
  const mpuDescription = document.querySelector('.mpu_description');
  // Overlay
  const mpuOverlay = document.querySelector('.mpu_overlay');
  const mpuOverlayOpacityValue = document.querySelector(
    '.mpu_overlay_opacity_value'
  );
  const mpuOverlayColor = document.querySelector('.mpu_overlay_color');
  const mpuOverlayBlurValue = document.querySelector('.mpu_overlay_blur_value');
  const mpuIsAuthorVisible = document.querySelector('.mpu_is_author_visible');
  const mpuTemplateChoice = document.querySelector('.mpu_template_choice');

  const mpuIsDesktopFullScreen = document.querySelector(
    '.mpu_is_desktop_full_screen'
  );
  const mpuDesktopMinWidth = document.querySelector('.mpu_desktop_min_width');
  const mpuDesktopMaxWidth = document.querySelector('.mpu_desktop_max_width');
  const mpuDesktopMinHeight = document.querySelector('.mpu_desktop_min_height');
  const mpuDesktopMaxHeight = document.querySelector('.mpu_desktop_max_height');

  const mpuIsMobileFullScreen = document.querySelector(
    '.mpu_is_mobile_full_screen'
  );
  const mpuMobileMinWidth = document.querySelector('.mpu_mobile_min_width');
  const mpuMobileMaxWidth = document.querySelector('.mpu_mobile_max_width');
  const mpuMobileMinHeight = document.querySelector('.mpu_mobile_min_height');
  const mpuMobileMaxHeight = document.querySelector('.mpu_mobile_max_height');

  // Text style
  const mpuTextStyle = document.querySelector('.mpu_text_style');
  const mpuTextColor = document.querySelector('.mpu_text_color');
  const mpuFontFamily = document.querySelector('.mpu_font_family');
  const mpuFontSize = document.querySelector('.mpu_font_size');
  const mpuIsTitleShadow = document.querySelector('.mpu_is_title_shadow');
  const mpuTitleShadowType = document.querySelector('.mpu_title_shadow_type');
  const mpuTitleShadowSize = document.querySelector('.mpu_title_shadow_size');
  const mpuTitleShadowColor = document.querySelector('.mpu_title_shadow_color');
  const mpuTitleStyle = document.querySelector('.mpu_title_style');
  const mpuTitleWeight = document.querySelector('.mpu_title_weight');
  const mpuTitleSize = document.querySelector('.mpu_title_size');
  const mpuTitleLetterSpacing = document.querySelector(
    '.mpu_title_letter_spacing'
  );
  const mpuTitleAlign = document.querySelector('.mpu_title_align');
  const mpuContentAlign = document.querySelector('.mpu_content_align');
  const mpuButtonAlign = document.querySelector('.mpu_button_align');

  // Background PopUp
  // const mpuInnerBackground = document.querySelectorAll('.mpu_inner_background');
  const mpuInnerBackgroundColor = document.querySelector(
    '.mpu_inner_background_color'
  );



  // Media open pour l'image arrière plan
  const mpuInnerBackgroundImageMediaOpen = document.querySelector(
    '.mpu_inner_background_image_media_open'
  );
  const mpuInnerBackgroundImagePreview = document.querySelector(
    '.mpu_inner_background_image_preview'
  );
  let mpuInnerBackgroundImageRelativePath = '';


  // ICI PENSER A NETTOYER SI LE TYPE CHANGE D'AVIS DANS LE BOUTON RADiO
  if(mpuInnerBackgroundImageMediaOpen) {
    mpuInnerBackgroundImageMediaOpen.addEventListener('click', function (event) {
      event.preventDefault();

      // Ouvrir la médiathèque WordPress
      const mediaUploader = wp.media({
        title: 'Sélectionnez une image',
        button: {
          text: 'Insérer',
        },
        multiple: false, // Changer à true pour permettre la sélection de plusieurs fichiers
      });

        // Lorsqu'un ou plusieurs fichiers sont sélectionnés
      mediaUploader.on('select', function () {
        const attachment = mediaUploader
          .state()
          .get('selection')
          .first()
          .toJSON();

        // Récupérer l'URL de l'image sélectionnée
        const imageUrl = attachment.url;

        // Récupérer le chemin relatif de l'image
        mpuInnerBackgroundImageRelativePath = imageUrl.replace(siteData.root_url, '');

        // Mettre à jour l'attribut src de l'élément <img> avec l'URL de l'image sélectionnée en chemin relatif
        mpuInnerBackgroundImagePreview.src = mpuInnerBackgroundImageRelativePath;
      });

      // Ouvrir la fenêtre modale de la médiathèque
      mediaUploader.open();
    });
  }
  if(mpuInnerBackgroundImagePreview) {
    // Listener pour supprimer le message d'erreur en cas de clear après activation/désactivation du bouton. La fonction est dans additional-functions.js
    mpuInnerBackgroundImagePreview.addEventListener('error', errorHandler);
  }


// Fin du media open
  const mpuInnerBackgroundImageStyle = document.querySelector(
    '.mpu_inner_background_image_style'
  );

  // Border
    // Le premier est un bouton radio

  const mpuBorderWeight = document.querySelector('.mpu_border_weight');
  const mpuBorderColor = document.querySelector('.mpu_border_color');

  // Animation opening
  const mpuAnimationOpening = document.querySelector('.mpu_animation_opening');


  // ------------------------------------ Options supp -------------------------- //
  // Is sound opening
  const mpuIsSoundOnOpen = document.querySelector('.mpu_is_sound_on_open');
  // Sound opening
  const mpuSoundOpeningMediaOpen = document.querySelector('.mpu_sound_opening_media_open');
  // Récupérer l'élément <audio> pour afficher le lecteur audio
  const audioOpenElement = document.querySelector('.sound_opening_preview');
  // Le path
  let mpuSoundOpenRelativePath = "";


  if(mpuSoundOpeningMediaOpen) {
    mpuSoundOpeningMediaOpen.addEventListener('click', function(event) {
      event.preventDefault();
    
      // Ouvrir la médiathèque WordPress
      const mediaUploader = wp.media({
        title: 'Sélectionnez un fichier audio',
        button: {
          text: 'Insérer',
        },
        multiple: false,
        library: {
          type: 'audio', // Filtrer uniquement les fichiers audio
        },
      });
    
      // Lorsqu'un fichier audio est sélectionné
      mediaUploader.on('select', function() {
        const attachment = mediaUploader.state().get('selection').first().toJSON();
    
        // Récupérer l'URL du fichier audio sélectionné
        mpuSoundOpenRelativePath = attachment.url;

    
        // Mettre à jour l'attribut src de l'élément <audio> avec l'URL du fichier audio sélectionné
        audioOpenElement.src = mpuSoundOpenRelativePath;
        // audioOpenElement.style.display = 'block';
        if (audioOpenElement.src != "") {
          audioOpenElement.style.display = 'block'; // ou autre style pour l'afficher
        } else {
          audioOpenElement.style.display = 'none'; // pour la masquer
        }
      });
    
      // Ouvrir la fenêtre modale de la médiathèque
      mediaUploader.open();
    });
  }
  if(audioOpenElement) {
    // au moment du nettoyage eviter les erreurs
    audioOpenElement.addEventListener('error', errorHandler);
  }


  // Is sound closing
  const mpuIsSoundOnClosing = document.querySelector('.mpu_is_sound_on_closing');
  // Sound opening
  const mpuSoundClosingMediaOpen = document.querySelector('.mpu_sound_closing_media_open');
  // Récupérer l'élément <audio> pour afficher le lecteur audio
  const audioCloseElement = document.querySelector('.sound_closing_preview');
  // Le path
  let mpuSoundClosingRelativePath = "";

  if(mpuSoundClosingMediaOpen) {
    mpuSoundClosingMediaOpen.addEventListener('click', function(event) {
      event.preventDefault();
    
      // Ouvrir la médiathèque WordPress
      const mediaUploader = wp.media({
        title: 'Sélectionnez un fichier audio',
        button: {
          text: 'Insérer',
        },
        multiple: false,
        library: {
          type: 'audio', // Filtrer uniquement les fichiers audio
        },
      });
    
      // Lorsqu'un fichier audio est sélectionné
      mediaUploader.on('select', function() {
        const attachment = mediaUploader.state().get('selection').first().toJSON();
    
        // Récupérer l'URL du fichier audio sélectionné
        mpuSoundClosingRelativePath = attachment.url;

    
        // Mettre à jour l'attribut src de l'élément <audio> avec l'URL du fichier audio sélectionné
        audioCloseElement.src = mpuSoundClosingRelativePath;
        // audioCloseElement.style.display = 'block';
        if (audioCloseElement.src != "") {
          audioCloseElement.style.display = 'block'; // ou autre style pour l'afficher
        } else {
          audioCloseElement.style.display = 'none'; // pour la masquer
        }
      });
    
      // Ouvrir la fenêtre modale de la médiathèque
      mediaUploader.open();
    });
  }
  if(audioCloseElement) {
    // au moment du nettoyage eviter les erreurs
    audioCloseElement.addEventListener('error', errorHandler);
  }
 



  const submitButton = document.querySelector('.mpu_submit');

  if (submitButton) {
    submitButton.addEventListener('click', function () {

      
      var mpuInnerBackground = document.querySelector('.mpu_inner_background:checked').value;
      var mpuBorderStyle = document.querySelector('.mpu_border_style:checked').value;

      const data = {
        status: 'publish',
        mpu_post_title: mpuTitle.value,
        mpu_activate: mpuActivate.checked ? '1' : '0',
        mpu_is_all_pages: mpuIsAllPages.checked ? '1' : '0',
        mpu_is_except: Array.from(mpuIsExcept)
          .filter((input) => input.checked)
          .map((input) => input.value),
        mpu_is_all_articles: mpuIsAllArticles.checked ? '1' : '0',

        //     // Visuel
        mpu_add_site_logo: mpuAddSiteLogo.checked ? true : '0',
        mpu_base_site_logo: mpuAddSiteLogo.checked ? true : '0',
        mpu_custom_logo: mpuCustomLogoRelativePath,
        mpu_is_title_visible: mpuIsTitleVisible.checked ? true : '0',
        mpu_header_title: mpuHeaderTitle.value,
        mpu_is_body_content_visible: mpuIsBodyContentVisible.checked
          ? true
          : '0',
        mpu_body_content: mpuBodyContent.value,
        mpu_is_description_visible: mpuIsDescriptionVisible.checked
          ? true
          : '0',
        mpu_description: mpuDescription.value,
        mpu_overlay: mpuOverlay.value,
        mpu_overlay_opacity_value: mpuOverlayOpacityValue.value,
        mpu_overlay_color: mpuOverlayColor.value,
        mpu_overlay_blur_value: mpuOverlayBlurValue.value,
        mpu_is_author_visible: mpuIsAuthorVisible.checked ? true : '0',
        mpu_template_choice: mpuTemplateChoice.value,

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

        // Text style
        'mpu_text_style': mpuTextStyle.value,
        'mpu_text_color': mpuTextColor.value,
        'mpu_font_family': mpuFontFamily.value,
        'mpu_font_size': mpuFontSize.value,
        'mpu_is_title_shadow' : mpuIsTitleShadow.checked ? true : '0',
        'mpu_title_shadow_type': mpuTitleShadowType.value,
        'mpu_title_shadow_size': mpuTitleShadowSize.value,
        'mpu_title_shadow_color': mpuTitleShadowColor.value,
        'mpu_title_style': mpuTitleStyle.value,
        'mpu_title_weight': mpuTitleWeight.value,
        'mpu_title_size': mpuTitleSize.value,
        'mpu_title_letter_spacing': mpuTitleLetterSpacing.value,
        'mpu_title_align': mpuTitleAlign.value,
        'mpu_content_align': mpuContentAlign.value,
        'mpu_button_align': mpuButtonAlign.value,

        // Background Popup
        // 'mpu_inner_background': mpuInnerBackground.value,
        'mpu_inner_background': mpuInnerBackground,
        'mpu_inner_background_color': mpuInnerBackgroundColor.value,
        'mpu_inner_background_image': mpuInnerBackgroundImageRelativePath,
        'mpu_inner_background_image_style': mpuInnerBackgroundImageStyle.value,

        // Border
        'mpu_border_style': mpuBorderStyle,
        'mpu_border_weight': mpuBorderWeight.value,
        'mpu_border_color': mpuBorderColor.value,

        // Animation opening
        'mpu_animation_opening': mpuAnimationOpening.value,


        // Options Supp
          //open sound
        'mpu_is_sound_on_open' : mpuIsSoundOnOpen.checked ? true : '0',
        'mpu_sound_open' : mpuSoundOpenRelativePath,
          //close sound
        'mpu_is_sound_on_closing' : mpuIsSoundOnClosing.checked ? true : '0',
        'mpu_sound_closing' : mpuSoundClosingRelativePath,
      };

      // Vérification du titre
      if (mpuTitle.value.trim() === '') {
        errorMessage.textContent = 'Le titre est obligatoire';
        errorMessage.style.display = 'block';
        return; // La validation a échoué
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
          mpuTitle.value = '';
        } else {
          const response = JSON.parse(xhr.responseText);
          console.log('Dommage');
          console.log(response.message);
        }
      };

      xhr.send(JSON.stringify(data));
    });
  }


  const saveEditButton = document.querySelector('.mpu_save_edit_button');
  const mpuShortcodeId = document.querySelector('.mpu_shortcode_id');
  if (saveEditButton) {
    saveEditButton.addEventListener('click', function () {

      var mpuInnerBackground = document.querySelector('.mpu_inner_background:checked').value;
      var mpuBorderStyle = document.querySelector('.mpu_border_style:checked').value;

      var EditOpenSound = "";
      if(audioOpenElement && audioOpenElement.src != "") {
        EditOpenSound = audioOpenElement.src
      }

      const data = {
        status: 'publish',
        mpu_post_title: mpuTitle.value,
        mpu_activate: mpuActivate.checked ? '1' : '0',
        mpu_is_all_pages: mpuIsAllPages.checked ? '1' : '0',
        mpu_is_except: Array.from(mpuIsExcept)
          .filter((input) => input.checked)
          .map((input) => input.value),
        mpu_is_all_articles: mpuIsAllArticles.checked ? '1' : '0',

        // Visuel
        mpu_add_site_logo: mpuAddSiteLogo.checked ? true : '0',
        mpu_base_site_logo: mpuAddSiteLogo.checked ? true : '0',
        mpu_custom_logo: mpuCustomLogoPreview.src,
        mpu_is_title_visible: mpuIsTitleVisible.checked ? true : '0',
        mpu_header_title: mpuHeaderTitle.value,

        mpu_is_body_content_visible: mpuIsBodyContentVisible.checked
        ? true
        : '0',
        mpu_body_content: mpuBodyContent.value,
        mpu_is_description_visible: mpuIsDescriptionVisible.checked
          ? true
          : '0',
        mpu_description: mpuDescription.value,
        mpu_overlay: mpuOverlay.value,
        mpu_overlay_opacity_value: mpuOverlayOpacityValue.value,
        mpu_overlay_color: mpuOverlayColor.value,
        mpu_overlay_blur_value: mpuOverlayBlurValue.value,
        mpu_is_author_visible: mpuIsAuthorVisible.checked ? true : '0',
        mpu_template_choice: mpuTemplateChoice.value,

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

        // Text style
        'mpu_text_style': mpuTextStyle.value,
        'mpu_text_color': mpuTextColor.value,
        'mpu_font_family': mpuFontFamily.value,
        'mpu_font_size': mpuFontSize.value,
        'mpu_is_title_shadow' : mpuIsTitleShadow.checked ? true : '0',
        'mpu_title_shadow_type': mpuTitleShadowType.value,
        'mpu_title_shadow_size': mpuTitleShadowSize.value,
        'mpu_title_shadow_color': mpuTitleShadowColor.value,
        'mpu_title_style': mpuTitleStyle.value,
        'mpu_title_weight': mpuTitleWeight.value,
        'mpu_title_size': mpuTitleSize.value,
        'mpu_title_letter_spacing': mpuTitleLetterSpacing.value,
        'mpu_title_align': mpuTitleAlign.value,
        'mpu_content_align': mpuContentAlign.value,
        'mpu_button_align': mpuButtonAlign.value,

        // Background Popup
        // 'mpu_inner_background': mpuInnerBackground.value,
        'mpu_inner_background': mpuInnerBackground,
        'mpu_inner_background_color': mpuInnerBackgroundColor.value,
        'mpu_inner_background_image': mpuInnerBackgroundImageRelativePath,
        'mpu_inner_background_image_style': mpuInnerBackgroundImageStyle.value,

        // Border
        'mpu_border_style': mpuBorderStyle,
        'mpu_border_weight': mpuBorderWeight.value,
        'mpu_border_color': mpuBorderColor.value,

        // Animation opening
        'mpu_animation_opening': mpuAnimationOpening.value,


        // Options Supp
          //open sound
        'mpu_is_sound_on_open' : mpuIsSoundOnOpen.checked ? true : '0',
        'mpu_sound_open' : EditOpenSound,
          //close sound
        'mpu_is_sound_on_closing' : mpuIsSoundOnClosing.checked ? true : '0',
        'mpu_sound_closing' : mpuSoundClosingRelativePath,
      };

      const xhr = new XMLHttpRequest();
      xhr.open(
        'PUT',
        siteData.root_url +
          '/wp-json/mpu-shortcodes/v1/manageShortcodes/' +
          mpuShortcodeId.value
      );
      xhr.setRequestHeader('Content-Type', 'application/json');
      xhr.setRequestHeader('X-WP-Nonce', siteData.nonce);

      xhr.onload = function () {
        if (xhr.status === 200) {
          const response = JSON.parse(xhr.responseText);
          console.log('Bien ouej');
          console.log(response);

          // Réinitialisation des champs
          mpuTitle.value = '';

          if (response.data == 'Un problème est survenu !') {
            errorMessage.style.display = 'block';
            errorMessage.textContent = 'Un problème est survenu !';
          }
        } else {
          const response = JSON.parse(xhr.responseText);
          console.log('Dommage');
          console.log(response.message);
          errorMessage.style.display = 'block';
          errorMessage.textContent = 'Un problème est survenu !';
        }
      };

      xhr.send(JSON.stringify(data));
    });
  }

});
