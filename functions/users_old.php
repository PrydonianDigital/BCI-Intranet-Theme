<?php

add_action( 'show_user_profile', 'add_bci_user_details' );
add_action( 'edit_user_profile', 'add_bci_user_details' );

function add_bci_user_details( $user ) {
    ?>
        <h3>Your BCI Details</h3>

        <table class="form-table">
            <tr>
                <th><label for="title">Title</label></th>
                <td><input type="text" name="title" value="<?php echo esc_attr(get_the_author_meta( 'title', $user->ID )); ?>" class="regular-text" /></td>
            </tr>

            <tr>
                <th><label for="department">Department</label></th>
                <td><input type="text" name="department" value="<?php echo esc_attr(get_the_author_meta( 'department', $user->ID )); ?>" class="regular-text" /></td>
            </tr>

            <tr>
                <th><label for="company">Company</label></th>
                <td><input type="text" name="company" value="<?php echo esc_attr(get_the_author_meta( 'company', $user->ID )); ?>" class="regular-text" /></td>
            </tr>

            <tr>
                <th><label for="extension">Extension</label></th>
                <td><input type="text" name="extension" value="<?php echo esc_attr(get_the_author_meta( 'extension', $user->ID )); ?>" class="regular-text" /></td>
            </tr>


            <tr>
                <th><label for="extras">Health &amp; Safety Roles</label></th>
                <td><input type="checkbox" name="main_safety" id="main_safety" value="yes" <?php if (esc_attr( get_the_author_meta( "main_safety", $user->ID )) == "yes") echo "checked"; ?> /> Main Safety<br />
                <input type="checkbox" name="fire_marshall" id="fire_marshall" value="yes" <?php if (esc_attr( get_the_author_meta( "fire_marshall", $user->ID )) == "yes") echo "checked"; ?> /> Fire Marshall<br />
                <input type="checkbox" name="first_aider" id="first_aider" value="yes" <?php if (esc_attr( get_the_author_meta( "first_aider", $user->ID )) == "yes") echo "checked"; ?> /> First Aider<br />
                </td>
            </tr>
            <tr>
	            <th><label for="extras">Voluntary Roles</label></th>
	            <td><input type="checkbox" name="social_committee" id="social_committee" value="yes" <?php if (esc_attr( get_the_author_meta( "social_committee", $user->ID )) == "yes") echo "checked"; ?> /> Social Committee<br />
                <input type="checkbox" name="phd_forum" id="phd_forum" value="yes" <?php if (esc_attr( get_the_author_meta( "phd_forum", $user->ID )) == "yes") echo "checked"; ?> /> PhD Forum
<br />
                <input type="checkbox" name="postdoc_forum" id="postdoc_forum" value="yes" <?php if (esc_attr( get_the_author_meta( "postdoc_forum", $user->ID )) == "yes") echo "checked"; ?> /> Postdoc Forum<br />
                <input type="checkbox" name="comms_committee" id="comms_committee" value="yes" <?php if (esc_attr( get_the_author_meta( "comms_committee", $user->ID )) == "yes") echo "checked"; ?> /> Comms Committee<br />
                <input type="checkbox" name="athena_swan" id="athena_swan" value="yes" <?php if (esc_attr( get_the_author_meta( "athena_swan", $user->ID )) == "yes") echo "checked"; ?> /> Athena SWAN<br />
                <input type="checkbox" name="athena_voluntary" id="athena_swan" value="yes" <?php if (esc_attr( get_the_author_meta( "athena_voluntary", $user->ID )) == "yes") echo "checked"; ?> /> Athena Voluntary<br />
                <input type="checkbox" name="smt" id="smt" value="yes" <?php if (esc_attr( get_the_author_meta( "smt", $user->ID )) == "yes") echo "checked"; ?> /> SMT<br />
	            </td>
            </tr>
            <tr>
	            <th><label for="extras">Centre Roles</label></th>
	            <td>
                <input type="checkbox" name="lab_manager" id="lab_manager" value="yes" <?php if (esc_attr( get_the_author_meta( "lab_manager", $user->ID )) == "yes") echo "checked"; ?> /> Lab Manager<br />
                <input type="checkbox" name="centre_admininstrator" id="centre_administrator" value="yes" <?php if (esc_attr( get_the_author_meta( "centre_administrator", $user->ID )) == "yes") echo "checked"; ?> /> Centre Administrator<br />
                </td>
            </tr>
        </table>
    <?php
}
add_action( 'personal_options_update', 'save_bci_user_details' );
add_action( 'edit_user_profile_update', 'save_bci_user_details' );

function save_bci_user_details( $user_id ) {
    update_user_meta( $user_id,'title', sanitize_text_field( $_POST['title'] ) );
    update_user_meta( $user_id,'department', sanitize_text_field( $_POST['department'] ) );
    update_user_meta( $user_id,'company', sanitize_text_field( $_POST['company'] ) );
    update_user_meta( $user_id,'extension', sanitize_text_field( $_POST['extension'] ) );
	update_user_meta( $user_id, 'main_safety', $_POST['main_safety'] );
	update_user_meta( $user_id, 'fire_marshall', $_POST['fire_marshall'] );
	update_user_meta( $user_id, 'first_aider', $_POST['first_aider'] );
	update_user_meta( $user_id, 'social_committee', $_POST['social_committee'] );
	update_user_meta( $user_id, 'comms_committee', $_POST['comms_committee'] );
	update_user_meta( $user_id, 'lab_manager', $_POST['lab_manager'] );
	update_user_meta( $user_id, 'centre_administrator', $_POST['centre_administrator'] );
	update_user_meta( $user_id, 'phd_forum', $_POST['phd_forum'] );
	update_user_meta( $user_id, 'postdoc_forum', $_POST['postdoc_forum'] );
	update_user_meta( $user_id, 'athena_swan', $_POST['athena_swan'] );
	update_user_meta( $user_id, 'athena_voluntary', $_POST['athena_voluntary'] );
	update_user_meta( $user_id, 'smt', $_POST['smt'] );
}
