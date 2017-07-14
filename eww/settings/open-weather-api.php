<?php

namespace EWW\Settings;

class Open_Weather_API implements Settings  {
	const OPTION_NAME = 'eww_settings';

	public function init() {
		$this->attach_hooks();
	}

	public function attach_hooks() {
		add_action( 'admin_init', array( $this, 'add_setting' ) );
	}


	public function add_setting() {
		register_setting(
			'general',
			self::OPTION_NAME,
			array( $this, 'validate' )
		);
		add_settings_field(
			'api_key',
			'Easy Weather Widget',
			array( $this, 'output_setting' ),
			'general',
			'default'
		);
	}

	public function output_setting() {
		$api_key = null;
		$options = get_option( self::OPTION_NAME, array() );
		if ( isset( $options['api_key'] ) ) {
			$api_key = $options['api_key'];
		}


		?>

		<tr id="owapi">
			<th scope="row"><label for="<?php esc_attr_e( self::OPTION_NAME ); ?>[api_key]">API Key </label></th>
			<td><input value="<?php esc_attr_e( $api_key ); ?>"
			           name="<?php esc_attr_e( self::OPTION_NAME ); ?>[api_key]" type="text"
			           id="<?php esc_attr_e( self::OPTION_NAME ); ?>-api_key" class="regular-text ltr">
				<p class="description" id="admin-api-key-description">See <a target="_BLANK" href="http://openweathermap.org/api">openweathermap.org/api</a> for more information.</p></td>
		</tr>


		<?php
	}

	public function validate( $value ) {

		$value['api_key'] = sanitize_text_field( $value['api_key'] );

		return $value;

	}

	public function get( $key ) {
		$option = get_option( self::OPTION_NAME );
		if ( isset( $option[ $key ] ) ) {
			return $option[ $key ];
		}

		return false;

	}

}