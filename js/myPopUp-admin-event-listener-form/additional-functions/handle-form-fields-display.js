document.addEventListener('DOMContentLoaded', function (event) {

// ----------------------------- ACTIVATION ----------------------------- //

  // Champs afficher sur toutes les pages ou pas

  const mpuIsAllPages = document.querySelector('.mpu_is_all_pages');

  // Les div qui apparaissent et disparaissent
  const mpuIsExceptDiv = document.querySelector('.mpu_exclure_div');




  // Gestionnaire d'événements pour l'option "Afficher sur toutes les pages"
  if (mpuIsAllPages) {
      // Cacher le groupe de div "Except" par défaut
    if (mpuIsExceptDiv && !mpuIsAllPages.checked) {
      hideElementCheckboxGroup(mpuIsExceptDiv);
    } else {
      showElementGroup(mpuIsExceptDiv);
    }

      mpuIsAllPages.addEventListener('change', function () {
        if (mpuIsAllPages.checked) {
          showElementGroup(mpuIsExceptDiv);
        } else {
          // Si l'option n'est pas cochée, cacher le groupe de div "Except" et vider ses valeurs
          hideElementCheckboxGroup(mpuIsExceptDiv);
        }
      });


  }

  

// ----------------------------- VISUEL ----------------------------- //
  // CUSTOM LOGO


  const mpuCustomLogoDivHideByDefault = document.querySelector(
    '.mpu_custom_logo_div_hide_by_default'
  );


  const mpuAddSiteLogo = document.querySelector('.mpu_add_site_logo');
  // if (mpuAddSiteLogo) {
  //   mpuAddSiteLogo.checked = false;
  // }

  const mpuBaseSiteLogoDivHideByDefault = document.querySelector(
    '.mpu_base_site_logo_div_hide_by_default'
  );

  if (mpuBaseSiteLogoDivHideByDefault && !mpuAddSiteLogo.checked) {
    hideImageButtonAndFieldGroup(mpuBaseSiteLogoDivHideByDefault);
  }

  // Ouvrir si le bouton d'ajout de logo actif
  if (mpuAddSiteLogo) {
    mpuAddSiteLogo.addEventListener('change', function () {
      if (mpuAddSiteLogo.checked) {
        showElementGroup(mpuBaseSiteLogoDivHideByDefault);
      } else {
        // Si l'option n'est pas cochée, cacher le groupe de div  et vider ses valeurs
        // On cache d'abord le switch custom logo ou logo de base qui est nettoyé
        hideElementCheckboxGroup(mpuBaseSiteLogoDivHideByDefault);
        hideImageButtonAndFieldGroup(
          mpuCustomLogoDivHideByDefault,
          '.mpu_custom_logo_preview'
        );
      }
    });
  }

  const mpuDefaultSiteLogo = document.querySelector('.mpu_base_site_logo');
  // if (mpuDefaultSiteLogo) {
  //   mpuDefaultSiteLogo.checked = false;
  // }
  // Ouvrir le bouton du logo custom si actif
  if (mpuDefaultSiteLogo) {
    mpuDefaultSiteLogo.addEventListener('change', function () {
      if (mpuDefaultSiteLogo.checked) {
        showElementGroup(mpuCustomLogoDivHideByDefault);
      } else {
        // Si l'option n'est pas cochée, cacher le groupe de div  et vider ses valeurs
        hideImageButtonAndFieldGroup(
          mpuCustomLogoDivHideByDefault,
          '.mpu_custom_logo_preview'
        );
      }
    });
  }
  if (mpuCustomLogoDivHideByDefault && !mpuAddSiteLogo.checked && !mpuDefaultSiteLogo.checked) {
    hideImageButtonAndFieldGroup(mpuCustomLogoDivHideByDefault);
  }

    // Titre dans la modale
    const mpuTitleDivHideByDefault = document.querySelector('#header_title');
    const mpuIsTitleVisible = document.querySelector('.mpu_is_title_visible');
    // Div cachée par défaut sauf si checked
    if (mpuTitleDivHideByDefault && !mpuIsTitleVisible.checked) {
      hideTextFieldElementGroup(mpuTitleDivHideByDefault, '.mpu_header_title',);
    }
    if (mpuIsTitleVisible) {
      mpuIsTitleVisible.addEventListener('change', function () {
        if (mpuIsTitleVisible.checked) {
          showElementGroup(mpuTitleDivHideByDefault);
        } else {
          // Si l'option n'est pas cochée, cacher le groupe de div  et vider ses valeurs
          hideTextFieldElementGroup(
            mpuTitleDivHideByDefault, '.mpu_header_title',
          );
        }
      });
    }
  

    // Custom content Modale
    const mpuIsBodyContentVisible = document.querySelector(
        '.mpu_is_body_content_visible'
    );
    const mpuBodyContentDivHideByDefault = document.querySelector('#custom_content_div');
    // Div cachée par défaut sauf si checked
    if (mpuBodyContentDivHideByDefault && !mpuIsBodyContentVisible.checked) {
        hideTextFieldElementGroup(mpuBodyContentDivHideByDefault, '.mpu_body_content',);
    }
    if (mpuIsBodyContentVisible) {
        mpuIsBodyContentVisible.addEventListener('change', function () {
            if (mpuIsBodyContentVisible.checked) {
                showElementGroup(mpuBodyContentDivHideByDefault);
            } else {
                // Si l'option n'est pas cochée, cacher le groupe de div  et vider ses valeurs
                hideTextFieldElementGroup(
                mpuBodyContentDivHideByDefault, '.mpu_body_content',
                );
            }
        });
    }

    const mpuIsDescriptionVisible = document.querySelector(
        '.mpu_is_description_visible'
    );
    const mpuDescriptionDivHideByDefault = document.querySelector('#custom_description_div');
    // Div cachée par défaut sauf si checked
    if (mpuDescriptionDivHideByDefault && ! mpuIsDescriptionVisible.checked) {
        hideTextFieldElementGroup(mpuDescriptionDivHideByDefault, '.mpu_description',);
    }
    if (mpuIsDescriptionVisible) {
        mpuIsDescriptionVisible.addEventListener('change', function () {
            if (mpuIsDescriptionVisible.checked) {
                showElementGroup(mpuDescriptionDivHideByDefault);
            } else {
                // Si l'option n'est pas cochée, cacher le groupe de div  et vider ses valeurs
                hideTextFieldElementGroup(
                mpuDescriptionDivHideByDefault, '.mpu_description',
                );
            }
        });
    }



    // Desktop Full screen
    const mpuIsDesktopFullScreen = document.querySelector(
      '.mpu_is_desktop_full_screen'
    );
    const mpuDesktopFullScreenDivHideByDefault = document.querySelector('#mpuDesktopFullScreenDivHideByDefault')
    if(mpuDesktopFullScreenDivHideByDefault && !mpuIsDesktopFullScreen.checked) {
      hideTextFieldElementGroup(mpuDesktopFullScreenDivHideByDefault, 
        '.mpu_desktop_min_width',
        '.mpu_desktop_max_width',
        '.mpu_desktop_min_height',
        '.mpu_desktop_max_height'
      );
    }
    if(mpuIsDesktopFullScreen) {
      mpuIsDesktopFullScreen.addEventListener('change', function () {
        if (mpuIsDesktopFullScreen.checked) {
          showElementGroupWithFlex(mpuDesktopFullScreenDivHideByDefault);
        } else {
            // Si l'option n'est pas cochée, cacher le groupe de div  et vider ses valeurs
            hideTextFieldElementGroup(mpuDesktopFullScreenDivHideByDefault, 
              '.mpu_desktop_min_width',
              '.mpu_desktop_max_width',
              '.mpu_desktop_min_height',
              '.mpu_desktop_max_height'
            );
        }
      });
    }


    //  Full screen
    const mpuIsMobileFullScreen = document.querySelector(
      '.mpu_is_mobile_full_screen'
    );
    const mpuMobileFullScreenDivHideByDefault = document.querySelector('#mpuMobileFullScreenDivHideByDefault')
    if(mpuMobileFullScreenDivHideByDefault && !mpuIsMobileFullScreen.checked) {
      hideTextFieldElementGroup(mpuMobileFullScreenDivHideByDefault, 
        '.mpu_mobile_min_width',
        '.mpu_mobile_max_width',
        '.mpu_mobile_min_height',
        '.mpu_mobile_max_height'
      );
    }
    if(mpuIsMobileFullScreen) {
      mpuIsMobileFullScreen.addEventListener('change', function () {
        if (mpuIsMobileFullScreen.checked) {
          showElementGroupWithFlex(mpuMobileFullScreenDivHideByDefault);
        } else {
            // Si l'option n'est pas cochée, cacher le groupe de div  et vider ses valeurs
            hideTextFieldElementGroup(mpuMobileFullScreenDivHideByDefault, 
              '.mpu_mobile_min_width',
              '.mpu_mobile_max_width',
              '.mpu_mobile_min_height',
              '.mpu_mobile_max_height'
            );
        }
      });
    }


    // Title Shadow
    const mpuIsTitleShadow = document.querySelector('.mpu_is_title_shadow');
    const mpuShadowTitleDivHideByDefault = document.querySelector('#mpuShadowTitleDivHideByDefault')
    if(mpuShadowTitleDivHideByDefault && !mpuIsTitleShadow.checked) {
      hideTextFieldElementGroup(mpuShadowTitleDivHideByDefault, 
        '.mpu_title_shadow_color',
      );
    }
    if(mpuIsTitleShadow) {
      mpuIsTitleShadow.addEventListener('change', function () {
        if (mpuIsTitleShadow.checked) {
          showElementGroupWithFlex(mpuShadowTitleDivHideByDefault);
        } else {
            // Si l'option n'est pas cochée, cacher le groupe de div  et vider ses valeurs
            hideTextFieldElementGroup(mpuShadowTitleDivHideByDefault, 
              '.mpu_title_shadow_color',
            );
        }
      });
    }




    // Checkboxes pour l'arrière plan de la modale
    var mpuInnerBackground = document.querySelectorAll('.mpu_inner_background');
    const mpuInnerBackgroundDivHideByDefaultColor = document.querySelector('#mpuInnerBackgroundDivHideByDefaultColor');
    const mpuInnerBackgroundDivHideByDefaultImage = document.querySelector('#mpuInnerBackgroundDivHideByDefaultImage');
    if(mpuInnerBackground) {

      var mpuInnerBackground = document.querySelectorAll('.mpu_inner_background');

      function handleSelectionChange(checkedValue) {
        if (checkedValue === 'couleur') {
          hideImageButtonAndFieldGroup(
            mpuInnerBackgroundDivHideByDefaultImage,
            '.mpu_inner_background_image_preview'
          );
          showElementGroup(mpuInnerBackgroundDivHideByDefaultColor);
      
        } else if (checkedValue === 'image') {
          hideTextFieldElementGroup(
            mpuInnerBackgroundDivHideByDefaultColor, '.mpu_inner_background_color'
          );
          showElementGroup(mpuInnerBackgroundDivHideByDefaultImage);
        
        } else if (checkedValue === 'transparent') {
          hideTextFieldElementGroup(
            mpuInnerBackgroundDivHideByDefaultColor, '.mpu_inner_background_color'
          );
          hideImageButtonAndFieldGroup(
            mpuInnerBackgroundDivHideByDefaultImage,
            '.mpu_inner_background_image_preview'
          );
        }
      }
      
      mpuInnerBackground.forEach(function(radio) {
        radio.addEventListener('click', function() {
          var checkedValue = this.value;
          handleSelectionChange(checkedValue);
        });
      });
      
      // Appel initial avec la valeur par défaut (couleur)
      handleSelectionChange('couleur');


    }

})