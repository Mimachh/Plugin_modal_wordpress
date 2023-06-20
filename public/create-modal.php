<?php

function createModalHTML($atts)
{

  // Récupérer les attributs du shortcode
  $atts = shortcode_atts(
    array(
      'id' => '1',
      'attribut2' => '2',
      'name' => ''
    ),
    $atts,
    'mpu_modal'
  );

  // Imaginons que l'attribut passé est un ID d'un shortcode crée par l'utilisateur, avec des champs de couleur, de texte etc.
  // Il suffit ici de faire une requête dans la bdd, de récupérer les infos du shortcode dont c'est l'ID et de les passer ensuite à la modale.
  // Je simule un shortcode qui viendrait de la bdd
  // [first-modal id="monpremiershortcode"]  Edit Delete
  // [first-modal id="monpremiershortcode"]
  // [first-modal id="monpremiershortcode"]
  // [first-modal id="monpremiershortcode"]
  $shortcodes2 = array(
    array(
      'id' => 1,
      'style' => 'Couleur: mpu_modale1, Font-size: mpu_xl',
      'opening_action' => 'Click'
    ),
    array(
      'id' => 2,
      'style' => 'Couleur: mpu_modale2, Font-size: mpu_sm',
      'opening_action' => 'Délai'
    )
  );


  $nameOfTheShortcode = $atts['name'];

  // Recherche des shortcodes et de la correspondance avec le nom
  $args = array(
    'post_type' => 'mpu_shortcode',
    'posts_per_page' => 1,
    'post_status' => 'publish',
    's' => $nameOfTheShortcode
  );

  $query = new WP_Query($args);

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();

      $post_id = get_the_ID();
      $post_title = get_the_title();

      // On arrête tout si activate n'est pas coché.
      $mpu_activate = get_post_meta($post_id, 'mpu_activate', true);
      if ($mpu_activate !== '1') {
        return;
      }

      $mpu_is_all_pages = get_post_meta($post_id, 'mpu_is_all_pages', true);
      $mpu_is_except = get_post_meta($post_id, 'mpu_is_except', true);
      $mpu_is_except = is_array($mpu_is_except) ? $mpu_is_except : array();
      // Articles
      $mpu_is_all_articles = get_post_meta($post_id, 'mpu_is_all_articles', true);

      // ici on affiche la modale

      // VERIFICATION POUR LES PAGES
      if (!is_single() and $mpu_is_all_pages === '1') {

        // S'il y a des exceptions
        if (count($mpu_is_except) > 0) {
          foreach ($mpu_is_except as $page_id) {
            if (!is_page($page_id)) {
              echo $post_title;
              echo $mpu_is_all_pages;
            } else {
              echo 'page non acceptée';
            }
          }
        } else {
          // Si aucune exception donc toutes les pages
          echo $post_title;
          echo $mpu_is_all_pages;
        }
      } else if (!is_single() and $mpu_is_all_pages !== '1') {
        echo 'désactivé pour les pages';
      }

      // VERIFICATION POUR LES ARTICLES
      if (!is_page() and $mpu_is_all_articles === "1" and is_single()) {
        echo 'activé pour les articles';
      } else if (!is_page() and $mpu_is_all_articles !== "1" and is_single()) {
        echo 'désactivé pour tous les articles';
      }
    }

    // Réinitialiser la requête
    wp_reset_postdata();
  } else {

    echo 'Aucune modale ne correspond à ce shortcode !';
  }




  // $idToFind = $atts['id'];

  $idToFind = 35000;

  $foundEntry = null;
  foreach ($shortcodes2 as $shortcode) {
    if ($shortcode['id'] == $idToFind) {
      $foundEntry = $shortcode;
      break;
    }
  }


  if ($foundEntry !== null) {
    // L'entrée a été trouvée


    function extractStyleDetails($style)
    {
      $details = array(
        'couleur' => '',
        'font-size' => '',
      );

      // Utilisation de l'expression régulière pour extraire les détails
      if (preg_match('/Couleur: ([a-zA-Z0-9_]+)/', $style, $matches)) {
        $details['couleur'] = $matches[1];
      }
      if (preg_match('/Font-size: ([a-zA-Z0-9_]+)/', $style, $matches)) {
        $details['font-size'] = $matches[1];
      }

      return $details;
    }
    $details = extractStyleDetails($foundEntry['style']);

    $classes = $details['couleur'] . ' ' . $details['font-size'];


    $modale =
      '
      <button onclick="openMympu_Modal()" id="open-button" class="mpu_button open-button">Vas y clique</button>
      <dialog class="mpu_modal ' . $classes . ' " id="modal">
        <h2 class="mpu_title">Titre</h2>
        <p class="mpu_subtitle">Si tu me cherche je suis dans public/create-modal.php <br>
        Mon style est dans css/myPopUp-public.css et mon js dans js/myPopUp.js 
        </p>
        <p>j\'ai ensuite appelé cette fonction dans myPopUp.php à la racine, juste avant les css, et d\'ailleurs j\ai modifié l\'appel du css et js public car le "admin_enqueue" ne marchait pas.</p>
        <button onclick="closeMympu_Modal()" class="button close-button">close modal</button>
        <form class="mpu_form" method="dialog">
          <label>Your name <input type="text"></label>
          <label>Your email <input type="email"></label>
          <button class="mpu_button" type="submit">submit form</button>
        </form>
      
      </dialog>
      ';
    return $modale;
  } else {
    // L'entrée n'a pas été trouvée
    echo "Aucune entrée avec l'ID recherché n'a été trouvée.";
  }
}
add_shortcode('mpu_modal', 'createModalHTML');
