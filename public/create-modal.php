<?php

function createModalHTML($atts)
{

  // Récupérer les attributs du shortcode
  $atts = shortcode_atts(
    array(
      'id' => '1',
      'attribut2' => '2',
    ),
    $atts,
    'first-modal'
  );

  // Imaginons que l'attribut passé est un ID d'un shortcode crée par l'utilisateur, avec des champs de couleur, de texte etc.
  // Il suffit ici de faire une requête dans la bdd, de récupérer les infos du shortcode dont c'est l'ID et de les passer ensuite à la modale.
  // Je simule un shortcode qui viendrait de la bdd

  $shortcodes = array(
    array(
      'id' => 1,
      'style' => 'Couleur: modale1, Font-size: xl',
      'opening_action' => 'Click'
    ),
    array(
      'id' => 2,
      'style' => 'Couleur: modale2, Font-size: sm',
      'opening_action' => 'Délai'
    )
  );

  $idToFind = $atts['id'];

  $foundEntry = null;
  foreach ($shortcodes as $shortcode) {
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
      if (preg_match('/Couleur: ([a-zA-Z0-9]+)/', $style, $matches)) {
        $details['couleur'] = $matches[1];
      }
      if (preg_match('/Font-size: ([a-zA-Z0-9]+)/', $style, $matches)) {
        $details['font-size'] = $matches[1];
      }

      return $details;
    }
    $details = extractStyleDetails($foundEntry['style']);

    $classes = $details['couleur'] . ' ' . $details['font-size'];


    $modale =
      '
      <button onclick="openMympu_Modal()" id="open-button" class="mpu_button open-button">Vas y clique</button>
      <dialog class="modal ' . $classes . '" id="modal">
        <h2 class="mpu_title">Titre</h2>
        <p class="mpu_subtitle">Si tu me cherche je suis dans public/create-modal.php <br>
        Mon style est dans css/myPopUp-public.css et mon js dans js/myPopUp.js 
        </p>
        <p>j\'ai ensuite appelé cette fonction dans myPopUp.php à la racine, juste avant les css, et d\'ailleurs j\ai modifié l\'appel du css et js public car le "admin_enqueue" ne marchait pas.</p>
        <button onclick="closeMyModal()" class="button close-button">close modal</button>
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
add_shortcode('first-modal', 'createModalHTML');
