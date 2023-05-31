<?php

function generate_delete_post_button($post_id) {
    // Vérifier si l'utilisateur a les droits nécessaires pour supprimer le post
    if (current_user_can('delete_post', $post_id)) {
        // Générer le lien de suppression du post
        $delete_link = get_delete_post_link($post_id);

        // Vérifier si le lien de suppression a été généré avec succès
        if ($delete_link) {
            // Créer le bouton de suppression
            $button = '<form method="post" class="delete-post-form" action="' . esc_url($delete_link) . '">';
            $button .= wp_nonce_field('delete-post_' . $post_id) . '<input type="hidden" name="action" value="delete">';
            $button .= '<button type="submit" class="delete-post-button button is-danger">Supprimer</button>';
            $button .= '</form>';

            return $button;
        }
    }

    return '';
}