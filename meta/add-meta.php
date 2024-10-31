<?php
/**
 * Adds a meta box to the post editing screen
 */
function prfx_custom_meta() {
	$types = array( 'post', 'page', 'custom-type' );
    add_meta_box( 'prfx_meta', __( 'SEO by Websites by Mark', 'prfx-textdomain' ), 'prfx_meta_callback', $types );
}
add_action( 'add_meta_boxes', 'prfx_custom_meta' );
?>