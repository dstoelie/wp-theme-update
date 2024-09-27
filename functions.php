<?php
/**
 * Functions and definitions
 *
 * @package Basticom
 */

DEFINE( 'THEME_VERSION', '1.0.0' );

function basticom_pre_set_site_transient_update_themes( $transient ) {
	// Query premium/private repo for updates.
	// $update = mytheme_check_for_updates( 'wp-theme-update' );
	$update = true;

	if ( $update ) {
		// Update is available.
		// $update should be an array containing all of the fields in $item below.
		// $transient->response['my-theme'] = $update;

		$transient->response['wp-theme-update'] = array(
			'theme'        => 'wp-theme-update',
			'new_version'  => THEME_VERSION,
			'url'          => 'https://github.com/dstoelie/wp-theme-update/',
			'package'      => 'https://github.com/dstoelie/wp-theme-update/archive/refs/tags/v1.0.0.zip',
			'requires'     => '',
			'requires_php' => '',
		);
	} else {
		// No update is available.
		$item = array(
			'theme'        => 'wp-theme-update',
			'new_version'  => THEME_VERSION,
			'url'          => '',
			'package'      => '',
			'requires'     => '',
			'requires_php' => '',
		);
		// Adding the "mock" item to the `no_update` property is required
		// for the enable/disable auto-updates links to correctly appear in UI.
		$transient->no_update['my-theme'] = $item;
	}

	return $transient;
}
add_filter( 'pre_set_site_transient_update_themes', 'basticom_pre_set_site_transient_update_themes' );
