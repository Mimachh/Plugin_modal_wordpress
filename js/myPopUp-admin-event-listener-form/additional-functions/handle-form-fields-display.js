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
    if (mpuBodyContentDivHideByDefault) {
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
    if (mpuDescriptionDivHideByDefault) {
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
})