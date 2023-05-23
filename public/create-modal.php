<?php 

function createModalHTML($atts) {

    // Récupérer les attributs du shortcode
    $atts = shortcode_atts(
        array(
            'color' => 'modale1',
            'attribut2' => '2',
        ),
        $atts,
        'first-modal'
    );

    $modale = 
    '
    <button onclick="openMyModal()" id="open-button" class="button open-button">Vas y clique</button>
    <dialog class="modal '. $atts['color'] .'" id="modal">
      <h2>Titre</h2>
      <p>Si tu me cherche je suis dans public/create-modal.php <br>
      Mon style est dans css/myPopUp-public.css et mon js dans js/myPopUp.js 
      </p>
      <p>j\'ai ensuite appelé cette fonction dans myPopUp.php à la racine, juste avant les css, et d\'ailleurs j\ai modifié l\'appel du css et js public car le "admin_enqueue" ne marchait pas.</p>
      <button onclick="closeMyModal()" class="button close-button">close modal</button>
      <form class="form" method="dialog">
        <label>Your name <input type="text"></label>
        <label>Your email <input type="email"></label>
        <button class="button" type="submit">submit form</button>
      </form>
    
    </dialog>
    ';
    return $modale;
}
add_shortcode('first-modal', 'createModalHTML');

