////// ACTIVATION /////////


//
Enable PopUp : "mpu_activate" => switch
Display all pages : "mpu_is_all_pages" => switch 
except : "mpu_is_except" => checkbox group
include: "mpu_is_include" => checkbox group



////// CONDITIONS /////////

//
Popup trigger : 
ICI le choix global : "mpu_is_triggered" => radio puis ajout de nouveaux champs?

    - onload 
        -> delai ? 
    - onclick
        -> button ?
    - onhover
        -> quel element? 
    - after visiting x pages
        -> combien de pages? 
    - inactivity
        -> delai?
    - scrolling to element
        -> quel élément?
    - open by scrolling down
        ->je sais pas
   

//
Pop up closing :
Choix se fait sur un checkbox group : "mpu_closing_way" => checkbox group
    - by pressing esc 
    - outofthebox

Hide close button: "mpu_is_close_button_hide" => switch

Custom close button: "mpu_is_custom_close_button" => switch / puis ça ouvre un nouveau champs
    -> "mpu_custom_close_img" => file   après a voir s'ils mettent ce qu'ils veulent ou si on fait un select et ils choisissent dedans

Position close button : "mpu_close_button_position" => select

Auto close delay : "mpu_is_auto_close" => switch
Timer close : "mpu_auto_close_delai => number??

Close the popup on scroll : "mpu_is_scroll_close_it" => switch
Close by classname on click: "mpu_is_close_with_classname" => text






Programmer le popup (date de départ, date de fin)
    "mpu_is_automatic_programed" => switch
        + "mpu_automatic_programed_start" => date
        + "mpu_automatic_programed_end" => date


////// OPTIONS SUPP /////////

Enable pop sound: 
    "mpu_is_sound_on_open" => switch
    "mpu_sound_open" => file audio

    "mpu_is_sound_on_closing" => switch
    "mpu_sound_closing" => file audio

Nombre de fois qu'il doit être display : "mpu_onscroll_number_appears" => number

Popup Name : affiché dans la popup liste
Popup Category (donc taxonomy)
    ## Les deux champs ici je ne sais pas trop pour l'instant 

Enable social media link : "mpu_is_social_media_link" => switch
    if oui
    il faut le choix des icones et pour chaque icone le lien a remplir vers son compte
    "mpu_is_social_media_facebook" => switch
        + "mpu_social_media_facebook_icon => select
        + "mpu_social_media_facebook_link" => text
    
    "mpu_is_social_media_instagram" => switch
        + "mpu_social_media_instagram_icon => select
        + "mpu_social_media_instagram_link" => text

Disable page scrolling : "mpu_is_body_scrollable" => switch

Action when clicking on popup button : "mpu_which_inner_button_doing" => select

Custom css








////// VISUEL /////////


//
Ajout de leur logo : "mpu_add_site_logo" => switch

//
Popup Title : "mpu_header_title" => text
Custom Content: "mpu_body_content" => textarea
Popup description: "mpu_description" => textarea


         
//


Overlay : liste des overlay possible "mpu_overlay" => radio a revoir dans le detail
    - backdrop
        + "mpu_overlay_opacity_value" => number 
        + "mpu_overlay_color" => colorpicker
        + "mpu_overlay_blur_value" => number
    - none 
    

L'auteur du popup : "mpu_is_author_visible" => switch



Style template : "mpu_template_choice" => select

Display content :
show title : "mpu_is_title_visible" => switch
show description: "mpu_is_description_visible" => switch

Full screen mod desktop : "mpu_is_desktop_full_screen" => switch
    if non
    Width : "mpu_desktop_width" => number
    Height: "mpu_desktop_height" => number
    Min height: "mpu_desktop_min_height" => number

Full screen mod mobile : "mpu_is_mobile_full_screen" => switch
    if non      
    Mobile max-width: "mpu_mobile_max_width" => number
    Mobile height: "mpu_mobile_max_height" => number
    Min height: "mpu_mobile_min_height" => number

Breakpoint : "mpu_mobile_breakpoint" => number


Padding interne : "mpu_inner_padding" => number   A voir si on laisse chaque padding indépendant

//
Text style : "mpu_text_style" => select ?
Text color: "mpu_text_color" => color picker
Font family: "mpu_font_family" => select
Font size : "mpu_font_size" => number
Text shadow: "mpu_text_shadow" => select ou radio
Après tout ça c'est géré par Gutenberg


Dans la pro :
Title style : "mpu_title_style" => select
Poid : "mpu_title_weight" => number ou select
Taille : "mpu_title_size" => number
Spacing : "mpu_title_letter_spacing" => number
Alignement: 
    "mpu_title_align" => select
    "mpu_content_align" => select
    "mpu_button_align" => select


//
Background : "mpu_inner_background" => radio
    - color: "mpu_inner_background_color" => color picker
    - image: "mpu_inner_background_image" => file
        + cover
        + repeat
        + contain
        // Radio


border: "mpu_border_style" => radio
    - none
    - solid
        + "mpu_border_solid_weight" => number
        + "mpu_border_color" => color picker
    - dashed
        + "mpu_border_solid_weight" => number
        + "mpu_border_color" => color picker

button style a revoir

Transform: "mpu_animation_opening" => select ou radio avec liste des animations dispo





