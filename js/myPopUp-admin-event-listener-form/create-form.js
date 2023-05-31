submitButton.addEventListener('click', function () {
    const data = {
        status: 'publish',
        'mpu_post_title': mpuTitle.value,
        'mpu_activate': mpuActivate.checked ? '1' : '0',
        'mpu_is_all_pages': mpuIsAllPages.checked ? '1' : '0',
        'mpu_is_except': Array.from(mpuIsExcept).filter(input => input.checked).map(input => input.value),
        'mpu_is_all_articles': mpuIsAllArticles.checked ? '1' : '0',
        
        // Visuel
        'mpu_add_site_logo' : mpuAddSiteLogo.checked ? true : '0',
        'mpu_is_title_visible' : mpuIsTitleVisible.checked ? true : '0',
        'mpu_header_title': mpuHeaderTitle.value,
        'mpu_is_body_content_visible' : mpuIsBodyContentVisible.checked ? true : '0',
        'mpu_body_content': mpuBodyContent.value,
        'mpu_is_description_visible' : mpuIsDescriptionVisible.checked ? true : '0',
        'mpu_description': mpuDescription.value,
        'mpu_overlay': mpuOverlay.value,
        'mpu_overlay_opacity_value': mpuOverlayOpacityValue.value,
        'mpu_overlay_color': mpuOverlayColor.value,
        'mpu_overlay_blur_value': mpuOverlayBlurValue.value,
        'mpu_is_author_visible' : mpuIsAuthorVisible.checked ? true : '0',
        'mpu_template_choice': mpuTemplateChoice.value,
        
        // 'mpu_is_desktop_full_screen' : mpuIsDesktopFullScreen.checked ? true : '0',
        // 'mpu_desktop_min_width': mpuDesktopMinWidth.value,
        // 'mpu_desktop_max_width': mpuDesktopMaxWidth.value,
        // 'mpu_desktop_min_height': mpuDesktopMinHeight.value,
        // 'mpu_desktop_max_height': mpuDesktopMaxHeight.value,

        // 'mpu_is_mobile_full_screen' : mpuIsMobileFullScreen.checked ? true : '0',
        // 'mpu_mobile_min_width': mpuMobileMinWidth.value,
        // 'mpu_mobile_max_width': mpuMobileMaxWidth.value,
        // 'mpu_mobile_min_height': mpuMobileMinHeight.value,
        // 'mpu_mobile_max_height': mpuMobileMaxHeight.value,

        // Text style
        // 'mpu_text_style': mpuTextStyle.value,
        // 'mpu_text_color': mpuTextColor.value,
        // 'mpu_font_family': mpuFontFamily.value,
        // 'mpu_font_size': mpuFontSize.value,
        // 'mpu_is_title_shadow' : mpuIsTitleShadow.checked ? true : '0',
        // 'mpu_title_shadow_type': mpuTitleShadowType.value,
        // 'mpu_title_shadow_size': mpuTitleShadowSize.value,
        // 'mpu_title_shadow_color': mpuTitleShadowColor.value,
        // 'mpu_title_style': mpuTitleStyle.value,
        // 'mpu_title_weight': mpuTitleWeight.value,
        // 'mpu_title_size': mpuTitleSize.value,
        // 'mpu_title_letter_spacing': mpuTitleLetterSpacing.value,
        // 'mpu_title_align': mpuTitleAlign.value,
        // 'mpu_content_align': mpuContentAlign.value,
        // 'mpu_button_align': mpuButtonAlign.value,

            // Background Popup
        // 'mpu_inner_background': mpuInnerBackground.value,
        // 'mpu_inner_background_color': mpuInnerBackgroundColor.value,
        // 'mpu_inner_background_image': mpuInnerBackgroundImage.value,
        // 'mpu_inner_background_image_style': mpuInnerBackgroundImageStyle.value,

            // Border
        // 'mpu_border_style': mpuBorderStyle.value,
        // 'mpu_border_weight': mpuBorderWeight.value,
        // 'mpu_border_color': mpuBorderColor.value,

            // Animation opening
        // 'mpu_animation_opening': mpuAnimationOpening.value,
    };

    
    // Vérification du titre
    if(mpuValidateTitle(mpuTitle) == false) {
        return;
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
        mpuTitle.value ="";
    } else {
        const response = JSON.parse(xhr.responseText);
        console.log('Dommage');
        console.log(response.message);
    }
    };

    xhr.send(JSON.stringify(data));
});