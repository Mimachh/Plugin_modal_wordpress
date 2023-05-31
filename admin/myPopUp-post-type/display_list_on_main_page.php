<?php
function display_mpu_shortcode_posts() {
    if (isset($_POST['delete_selected_posts'])) {
        $selected_posts = isset($_POST['selected_posts']) ? $_POST['selected_posts'] : array();

        if (!empty($selected_posts)) {
            foreach ($selected_posts as $post_id) {
                wp_delete_post($post_id, true);
            }

            wp_redirect($_SERVER['REQUEST_URI']);
            exit;
        } else { 
            // Afficher un message d'erreur ou une notification
            ?>
            <div class="notification is-danger mt-5">
                <p>Veuillez sélectionner des Shortcodes à supprimer.</p>
            </div>
            <?php
        }
    }

    $args = array(
        'post_type' => 'mpu_shortcode',
        'posts_per_page' => -1,
        'order' => 'ASC'
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        ?>

        <form method="POST" action="">
            <table class="table table is-striped is-hoverable is-fullwidth ">
                <thead>
                    <tr>
                        <th title="Select">-</th>
                        <th><abbr title="ID">ID</abbr></th>
                        <th><abbr title="Titre">Titre</abbr></th>
                        <th><abbr title="Shortcode">Shortcode</abbr></th>
                        <th><abbr title="Edit">-</abbr></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th title="Select">-</th>
                        <th><abbr title="ID">ID</abbr></th>
                        <th><abbr title="Titre">Titre</abbr></th>
                        <th><abbr title="Shortcode">Shortcode</abbr></th>
                        <th><abbr title="Edit">-</abbr></th>
                    </tr>
                </tfoot>
                <tbody>

                <?php
                while ($query->have_posts()) {
                    $query->the_post();
                    $post_position = $query->current_post + 1; // Ajout de 1 pour commencer à partir de 1
                    $post_title = get_the_title();
                    $post_link = get_permalink();
                    $post_id = get_the_ID();
                    ?>
                    <tr>
                        <td><input type="checkbox" name="selected_posts[]" value="<?php echo $post_id; ?>"></td>
                        <th><?php echo $post_position; ?></th>
                        <td><?php echo $post_title; ?></td>
                        <td>[mpu_modal name="<?php echo $post_title; ?>"]</td>
                        <td><a href="<?php echo admin_url('admin.php?page=myPopUp-options&id=' . $post_id); ?>" class="button is-warning">Editer</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <input type="submit" name="delete_selected_posts" value="Supprimer les posts sélectionnés" class="button is-danger">
        </form>

    <?php } else { ?>
        <p>Aucun Shortcode trouvé, vous pouvez commencer à en créer un <a href="<?php echo admin_url('admin.php?page=myPopUp-options'); ?>">ici</a></p>
    <?php }

    wp_reset_postdata();
}