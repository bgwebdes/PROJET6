<?php

namespace CCB\Includes;

use cBuilder\Classes\Database\Orders;

class Mixpanel_General extends Mixpanel {

	public static function register_data() {
		self::add_data( 'User Plan', self::get_user_plan() );
		self::add_data( 'Orders Count', count( Orders::get_all() ) );
		self::add_data( 'Global PDF Entries Used', self::pdf_entries_used() );
		self::add_data( 'Global Contact Form Used', self::contact_form_used() );
		self::add_data( 'Global Paypal Used', self::paypal_used() );
		self::add_data( 'Global Stripe Used', self::stripe_used() );
		self::add_data( 'Global Captcha Used', self::captcha_used() );
		self::add_data( 'Global Currency', self::global_currency() );
		self::add_data( 'Calculator Names', self::get_calculator_titles() );
	}

	public static function get_user_plan() {
		return defined( 'CCB_PRO' ) && defined( 'CCB_PRO_PATH' ) && defined( 'CCB_PRO_URL' ) ? 'Pro' : 'Free';
	}

	public static function pdf_entries_used() {
		return get_option( 'ccb_general_settings' )['invoice']['use_in_all'];
	}

	public static function contact_form_used() {
		$contact_form_settings = get_option( 'ccb_general_settings' )['form_fields'];
		return ( true === $contact_form_settings['use_in_all'] && ! empty( $contact_form_settings['adminEmailAddress'] ) );
	}

	public static function paypal_used() {
		$paypal_settings = get_option( 'ccb_general_settings' )['paypal'];
		return ( true === $paypal_settings['use_in_all'] && ! empty( $paypal_settings['paypal_email'] ) && 'live' === $paypal_settings['paypal_mode'] );
	}

	public static function stripe_used() {
		$stripe_settings = get_option( 'ccb_general_settings' )['stripe'];
		return ( true === $stripe_settings['use_in_all'] && ! empty( $stripe_settings['secretKey'] ) && ! empty( $stripe_settings['publishKey'] ) );
	}

	public static function captcha_used() {
		$captcha_settings = get_option( 'ccb_general_settings' )['recaptcha'];
		return ( '' !== ( current( array_values( $captcha_settings['v2'] ) ) ) || '' !== ( current( array_values( $captcha_settings['v2'] ) ) ) );
	}

	public static function global_currency() {
		$currency_settings = get_option( 'ccb_general_settings' )['currency'];
		return ( true === $currency_settings['use_in_all'] ) ? $currency_settings['currency'] : false;
	}

	public static function get_calculator_titles() {
		$calculator_names = array_column( \cBuilder\Classes\CCBUpdatesCallbacks::get_calculators(), 'post_title' );
		return implode( ', ', $calculator_names );
	}
}
