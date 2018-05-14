<?php

if ( ! class_exists( 'Allegiant_Notify_System' ) ) {
	/**
	 * Class Allegiant_Notify_System
	 */
	class CPOTheme_Notify_System extends Epsilon_Notify_System {

		public static $plugins;

		/**
		 * @return array
		 */
		public static function _get_plugins() {
			if ( ! function_exists( 'get_plugins' ) ) {
				require_once ABSPATH . 'wp-admin/includes/plugin.php';
			}
			return get_plugins();
		}

		/**
		 * @param $slug
		 *
		 * @return mixed
		 */
		public static function _get_plugin_basename_from_slug( $slug ) {
			if ( empty( self::$plugins ) ) {
				self::$plugins = array_keys( self::_get_plugins() );
			}
			$keys = self::$plugins;
			foreach ( $keys as $key ) {
				if ( preg_match( '|^' . $slug . '/|', $key ) ) {
					return $key;
				}
			}
			return $slug;
		}


		/**
		 * @param $ver
		 *
		 * @return mixed
		 */
		public static function version_check( $ver ) {
			$allegiant = wp_get_theme();

			return version_compare( $allegiant['Version'], $ver, '>=' );
		}

		/**
		 * @return bool
		 */
		public static function is_not_static_page() {
			return 'page' == get_option( 'show_on_front' ) ? true : false;
		}

		/**
		 * @return bool
		 */
		public static function has_widgets() {
			if ( ! is_active_sidebar( 'primary-widgets' ) && ! is_active_sidebar( 'secondary-widgets' ) ) {
				return false;
			}

			return true;
		}


		/**
		 * @return bool
		 */
		public static function check_plugin_is_installed( $slug ) {
			$plugin_path = self::_get_plugin_basename_from_slug( $slug );
			if ( file_exists( ABSPATH . 'wp-content/plugins/' . $plugin_path ) ) {
				return true;
			}
			return false;
		}

		/**
		 * @return bool
		 */
		public static function check_plugin_is_active( $slug ) {
			$plugin_path = self::_get_plugin_basename_from_slug( $slug );
			if ( file_exists( ABSPATH . 'wp-content/plugins/' . $plugin_path ) ) {
				include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
				return is_plugin_active( $plugin_path );
			}
		}

		public static function has_plugin( $slug = null ) {

			$check = array(
				'installed' => self::check_plugin_is_installed( $slug ),
				'active'    => self::check_plugin_is_active( $slug ),
			);

			if ( ! $check['installed'] || ! $check['active'] ) {
				return false;
			}

			return true;

		}

		public static function create_plugin_requirement_title( $install_text, $activate_text, $plugin_slug ) {

			if ( $plugin_slug == '' ) {
				return;
			}
			if ( $install_text == '' && $activate_text = '' ) {
				return;
			}
			if ( $install_text == '' && $activate_text != '' ) {
				$install_text = $activate_text;
			} elseif ( $activate_text == '' && $install_text != '' ) {
				$activate_text = $install_text;
			}

			$installed = self::check_plugin_is_installed( $plugin_slug );
			if ( ! $installed ) {
				return $install_text;
			} elseif ( ! self::check_plugin_is_active( $plugin_slug ) && $installed ) {
				return $activate_text;
			} else {
				return '';
			}

		}

		/**
		 * @return bool
		 */
		public static function is_not_template_front_page() {
			$page_id = get_option( 'page_on_front' );

			return get_page_template_slug( $page_id ) == 'page-templates/frontpage-template.php' ? true : false;
		}

		public static function check_content_import() {
			$content = get_option( 'allegiant_content_imported' );
			if ( $content ) {
				return true;
			}

			return false;
		}
	}
}
