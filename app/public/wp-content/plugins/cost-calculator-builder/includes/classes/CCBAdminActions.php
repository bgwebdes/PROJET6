<?php

namespace cBuilder\Classes;

class CCBAdminActions {
	public static function file_upload() {
		if ( is_array( $_FILES ) ) {
			if ( ! function_exists( 'wp_handle_upload' ) ) {
				require_once ABSPATH . 'wp-admin/includes/file.php';
			}

			$file_info = wp_handle_upload( $_FILES['file'], array( 'test_form' => false ) );

			if ( empty( $file_info['error'] ) ) {
				wp_send_json_success(
					array(
						'file_url' => $file_info['url'],
						'name'     => $_FILES['file']['name'],
					)
				);
			}
		}
	}
}
