<?php

/**
 * Epsilon Dashboard  Autoloader
 *
 * @package Creative_Agency
 * @since   1.1.0
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Class Epsilon_Dashboard_Autoloader
 */
class Epsilon_Dashboard_Autoloader {
	/**
	 * Epsilon_dashboard_Autoloader constructor.
	 */
	public function __construct() {

		spl_autoload_register( array( $this, 'load' ) );
	}

	/**
	 * This function loads the necessary files
	 *
	 * @param string $class CLASS NAME.
	 */
	public function load( $class = '' ) {

		/**
		 * All classes are prefixed with Creative_Agency_
		 */
		$parts = explode( '_', $class );
		$bind  = implode( '-', $parts );

		/**
		 * We provide working directories
		 */
		$directories = array(
			CREATIVE_AGENCY_DIR_PATH_LIBS ,
			CREATIVE_AGENCY_DIR_PATH_LIBS . 'epsilon-framework/',
			CREATIVE_AGENCY_DIR_PATH_LIBS . 'epsilon-theme-dashboard/',
			CREATIVE_AGENCY_DIR_PATH_LIBS . 'epsilon-theme-dashboard/inc/',
			CREATIVE_AGENCY_DIR_PATH_LIBS . 'epsilon-theme-dashboard/inc/helpers/',
			CREATIVE_AGENCY_DIR_PATH_LIBS . 'epsilon-theme-dashboard/inc/misc/',
			CREATIVE_AGENCY_DIR_PATH_LIBS . 'epsilon-theme-dashboard/inc/misc/demo-generators/',
			CREATIVE_AGENCY_DIR_PATH_LIBS . 'epsilon-theme-dashboard/inc/misc/epsilon-tracking/',
			CREATIVE_AGENCY_DIR_PATH_LIBS . 'epsilon-theme-dashboard/inc/misc/epsilon-tracking/trackers/',
		);

		/**
		 * Loop through them, if we find the class .. we load it !
		 */
		foreach ( $directories as $directory ) {
			if ( file_exists( $directory . 'class-' . strtolower( $bind ) . '.php' ) ) {
				require_once $directory . 'class-' . strtolower( $bind ) . '.php';

				return;
			}
		}


	}
}

new Epsilon_Dashboard_Autoloader();
