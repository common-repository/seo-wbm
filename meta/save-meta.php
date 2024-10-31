<?php
/**
 * Saves the custom meta input
 */
function prfx_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ '_wbm-search-phrase' ] ) ) {
        update_post_meta( $post_id, '_wbm-search-phrase', sanitize_text_field( $_POST[ '_wbm-search-phrase' ] ) );
    }
    if( isset( $_POST[ '_wbm-url-1' ] ) ) {
        update_post_meta( $post_id, '_wbm-url-1', sanitize_text_field( $_POST[ '_wbm-url-1' ] ) );
    }
	    if( isset( $_POST[ '_wbm-url-2' ] ) ) {
        update_post_meta( $post_id, '_wbm-url-2', sanitize_text_field( $_POST[ '_wbm-url-2' ] ) );
    }
	    if( isset( $_POST[ '_wbm-url-3' ] ) ) {
        update_post_meta( $post_id, '_wbm-url-3', sanitize_text_field( $_POST[ '_wbm-url-3' ] ) );
    }
 
}
add_action( 'save_post', 'prfx_meta_save' );
?>