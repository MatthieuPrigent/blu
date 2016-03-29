<?php
//Options page

/**
 * Plugin options markup
 */
function ab_plugin_options() {
	?>
	<div class="wrap ab-html-notification-wrap">
		<h2><?php _e( 'Html User Notification', 'abs' ); ?></h2>
		<h4><?php _e( 'Shortcode\'s', 'abs' ); ?></h4>
		<ol>
			<li class="ab-shortcode">User Display name : [ab-display-name]</li>
			<li class="ab-shortcode">Username : [ab-user-login]</li>
			<li class="ab-shortcode">Password : [ab-user-password]</li>
			<li class="ab-shortcode">User email : [ab-user-email]</li>
		</ol>
		<hr />
		<form method="post" action="options.php">

			<?php settings_fields( 'ab-settings-group' ); ?>
			<?php do_settings_sections( 'ab-settings-group' ); ?>

			<table class="form-table">
				<tr valign="top">

					<th scope="row"><?php _e( 'User Mail Content', 'abs' ); ?></th>
					<td><?php wp_editor( get_option( 'ab_user_mail_content' ), 'ab_user_mail_content', '' ); ?></td>

				</tr>
				<tr valign="top">

					<th scope="row"><?php _e( 'User Mail Subject', 'abs' ); ?></th>
					<td><input class="ab-mail-subject" type="text" name="ab_user_mail_subject" value="<?php echo get_option( 'ab_user_mail_subject' ); ?>" /></td>

				</tr>
				<tr valign="top">

					<th scope="row"><?php _e( 'User From Name', 'abs' ); ?></th>
					<td><input class="ab-mail-sender" type="text" name="ab_user_mail_sender_name" placeholder="yourname" value="<?php echo get_option( 'ab_user_mail_sender_name' ); ?>" /></td>

				</tr>
				<tr valign="top">

					<th scope="row"><?php _e( 'User From Email', 'abs' ); ?></th>
					<td>
						<input class="ab-mail-sender" type="text" name="ab_user_mail_sender_email" placeholder="wordpress@yoursite.com" value="<?php echo get_option( 'ab_user_mail_sender_email' ); ?>" />
						<p class="ab-note"><?php _e( 'You can specify the from name and from email. If left blank  default will be used.', 'ab' ); ?></p>
					</td>

				</tr>
				<tr class="ab-sepeartion" valign="top" ></tr>
				<tr valign="top">

					<th scope="row"><?php _e( 'Admin Mail Content', 'abs' ); ?></th>
					<td><?php wp_editor( get_option( 'ab_admin_mail_content' ), 'ab_admin_mail_content', '' ); ?></td>

				</tr>
				<tr valign="top">

					<th scope="row"><?php _e( 'Admin Mail Subject', 'abs' ); ?></th>
					<td><input class="ab-mail-subject" type="text" name="ab_admin_mail_subject" value="<?php echo get_option( 'ab_admin_mail_subject' ); ?>" /></td>

				</tr>
				<tr valign="top">

					<th scope="row"><?php _e( 'Admin From Name', 'abs' ); ?></th>
					<td><input class="ab-mail-sender" type="text" name="ab_admin_mail_sender_name" placeholder="yourname" value="<?php echo get_option( 'ab_admin_mail_sender_name' ); ?>" /></td>

				</tr>
				<tr valign="top">

					<th scope="row"><?php _e( 'Admin From Email', 'abs' ); ?></th>
					<td>
						<input class="ab-mail-sender" type="text" name="ab_admin_mail_sender_email" placeholder="wordpress@yoursite.com" value="<?php echo get_option( 'ab_admin_mail_sender_email' ); ?>" />
						<p class="ab-note"><?php _e( 'You can specify the from name and from email. If left blank  default will be used.', 'ab' ); ?></p>
					</td>

				</tr>
			</table>

			<?php submit_button(); ?>
		</form>

	</div>
	<?php
}

//call register settings function
add_action( 'admin_init', 'ab_register_mysettings' );

function ab_register_mysettings() {
	//register our settings
	register_setting( 'ab-settings-group', 'ab_user_mail_content' );
	register_setting( 'ab-settings-group', 'ab_admin_mail_content' );
	register_setting( 'ab-settings-group', 'ab_user_mail_subject' );
	register_setting( 'ab-settings-group', 'ab_admin_mail_subject' );
	register_setting( 'ab-settings-group', 'ab_user_mail_sender_email' );
	register_setting( 'ab-settings-group', 'ab_admin_mail_sender_email' );
	register_setting( 'ab-settings-group', 'ab_user_mail_sender_name' );
	register_setting( 'ab-settings-group', 'ab_admin_mail_sender_name' );
}
