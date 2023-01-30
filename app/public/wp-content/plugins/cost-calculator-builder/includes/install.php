<?php
function ccb_add_nonces() {
	$variables = array(
		'ccb_paypal'        => wp_create_nonce( 'ccb_paypal' ),
		'ccb_stripe'        => wp_create_nonce( 'ccb_stripe' ),
		'ccb_contact_form'  => wp_create_nonce( 'ccb_contact_form' ),
		'ccb_woo_checkout'  => wp_create_nonce( 'ccb_woo_checkout' ),
		'ccb_add_order'     => wp_create_nonce( 'ccb_add_order' ),
		'ccb_orders'        => wp_create_nonce( 'ccb_orders' ),
		'ccb_update_order'  => wp_create_nonce( 'ccb_update_order' ),
		'ccb_send_invoice'  => wp_create_nonce( 'ccb_send_invoice' ),
		'ccb_get_invoice'   => wp_create_nonce( 'ccb_get_invoice' ),
	);
	echo ( '<script type="text/javascript">window.ccb_nonces = ' . json_encode( $variables ) . ';</script>' ); //phpcs:ignore
}

function ccb_add_admin_nonces() {
	$variables = array(
		'ccb_ajax_add_feedback' => wp_create_nonce( 'ccb_ajax_add_feedback' ),
		'ccb_create_id'         => wp_create_nonce( 'ccb_create_id' ),
		'ccb_edit_calc'         => wp_create_nonce( 'ccb_edit_calc' ),
		'ccb_delete_calc'       => wp_create_nonce( 'ccb_delete_calc' ),
		'ccb_save_custom'       => wp_create_nonce( 'ccb_save_custom' ),
		'calc_skip_quick_tour'  => wp_create_nonce( 'calc_skip_quick_tour' ),
		'calc_skip_hint'        => wp_create_nonce( 'calc_skip_hint' ),
		'ccb_get_existing'      => wp_create_nonce( 'ccb_get_existing' ),
		'ccb_save_settings'     => wp_create_nonce( 'ccb_save_settings' ),
		'ccb_duplicate_calc'    => wp_create_nonce( 'ccb_duplicate_calc' ),
		'ccb_update_preset'     => wp_create_nonce( 'ccb_update_preset' ),
		'ccb_add_preset'        => wp_create_nonce( 'ccb_add_preset' ),
		'ccb_delete_preset'     => wp_create_nonce( 'ccb_delete_preset' ),
		'ccb_demo_import_apply' => wp_create_nonce( 'ccb_demo_import_apply' ),
		'ccb_demo_import_run'   => wp_create_nonce( 'ccb_demo_import_run' ),
		'ccb_run_calc_updates'  => wp_create_nonce( 'ccb_run_calc_updates' ),
		'ccb_custom_import'     => wp_create_nonce( 'ccb_custom_import' ),
		'ccb_orders'            => wp_create_nonce( 'ccb_orders' ),
		'ccb_update_order'      => wp_create_nonce( 'ccb_update_order' ),
		'ccb_delete_order'      => wp_create_nonce( 'ccb_delete_order' ),
		'ccb_complete_order'    => wp_create_nonce( 'ccb_complete_order' ),
		'ccb_send_quote'        => wp_create_nonce( 'ccb_send_quote' ),
	);

	echo ( '<script type="text/javascript">window.ccb_nonces = ' . json_encode( $variables ) . ';</script>' ); //phpcs:ignore
}

add_action( 'wp_head', 'ccb_add_nonces' );
add_action( 'admin_head', 'ccb_add_admin_nonces' );

function ccb_ajax_add_feedback() {
	check_ajax_referer( 'ccb_ajax_add_feedback', 'security' );
	update_option( 'ccb_feedback_added', true );
}

add_action( 'wp_ajax_ccb_ajax_add_feedback', 'ccb_ajax_add_feedback' );
