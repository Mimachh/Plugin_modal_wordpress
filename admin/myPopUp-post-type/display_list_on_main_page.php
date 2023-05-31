<?php

function display_mpu_shortcode_posts() {
    $args = array(
        'post_type' => 'mpu_shortcode',
        'posts_per_page' => -1,
        'order' => 'ASC'
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) { ?>

        <table class="table table is-striped is-hoverable is-fullwidth ">
            <thead>
                <tr>
                    <th><abbr title="ID">ID</abbr></th>
                    <th><abbr title="Titre">Titre</abbr></th>
                    <th><abbr title="Shortcode">Shortcode</abbr></th>
                    <th><abbr title="Edit">-</abbr></th>
                    <th><abbr title="Delete">-</abbr></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th><abbr title="ID">ID</abbr></th>
                    <th><abbr title="Titre">Titre</abbr></th>
                    <th><abbr title="Shortcode">Shortcode</abbr></th>
                    <th><abbr title="Edit">-</abbr></th>
                    <th><abbr title="Delete">-</abbr></th>
                </tr>
            </tfoot>
            <tbody>
        
                <?php

                while ($query->have_posts()) {
                    $query->the_post();
                    $post_position = $query->current_post + 1; // Ajout de 1 pour commencer à partir de 1
                    $post_title = get_the_title();
                    $post_link = get_permalink();
                ?>
                    <tr>
                        <th><?php echo $post_position; ?></th>
                        <td><?php echo $post_title; ?></td>
                        <td>[mpu_modal name="<?php echo $post_title; ?>"]</td>
                        <td><a href="<?php echo admin_url('admin.php?page=myPopUp-options&id=' . get_the_ID()); ?>" class="button is-warning">Editer</a></td>
                        <td>
                            <?php 
                            $post_id = get_the_ID();

                            // Générer le bouton de suppression
                            $delete_button = generate_delete_post_button($post_id);
                            echo $delete_button;
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

<?php } else { ?>
    <p>Aucun Shortcode trouvé, vous pouvez commencer à en crée un <a href="<?php echo admin_url('admin.php?page=myPopUp-options'); ?>">ici</a></p>
    <?php }

    wp_reset_postdata();
}