<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package aThemes
 */
?>
<div id="widget-area-2" class="site-sidebar widget-area" role="complementary">
	<?php 
		if (is_user_logged_in()){
			echo "<a href='http://www.blumagazine.fr/log-out/'>";
			echo "<input type='submit' value='Se déconnecter' class='search-submit site-login' autocomplete='off'>";
			echo "</a>";
		}
		else{
			echo "<a href='http://www.blumagazine.fr/se-connecter/'>";
			echo "<input type='submit' value='Se connecter' class='search-submit site-login' autocomplete='off'>";
			echo "</a>";
		}
	if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
	<?php endif; ?>
<!-- #widget-area-2 --></div>
