<?php

namespace EWW;


use EWW\Iocable\Registry;

class Widget extends \WP_Widget {


	protected static $ver = '0.1';
	protected $ioc;

	/**
	 * Initialization method
	 */
	public function init() {
		add_action( 'widgets_init', create_function( '', 'register_widget( "\\EWW\\Widget" );' ) );
	}

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		$this->ioc = Registry::get_ioc();

		parent::__construct(
			'eww-widget', // Base ID
			'Easy Weather Widget', // Name
			array( 'description' => __( 'A Simple Weather Widget.', $this->ioc['translate_domain'] ), ) // Args
		);
	}

	public function translate_temperature_scale( $temperature_scale ) {

		if ( 'Metric' === $temperature_scale ) {
			return __( '&deg; C', $this->ioc['translate_domain'] );
		}

		if ( 'Imperial' === $temperature_scale ) {
			return __( '&deg; F', $this->ioc['translate_domain'] );
		}

		if ( 'Kelvin' === $temperature_scale ) {
			return __( 'K', $this->ioc['translate_domain'] );
		}


	}

	/**
	 * Front-end display of widget.
	 *
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

		$template_file = plugin_dir_path( dirname( __FILE__ ) ) . 'views/widget.php';
		$template_file = apply_filters( 'eww_template', $template_file );
		$template_file = apply_filters( 'eww_' . $this->id . '_template', $template_file );

		/** @var \EWW\Settings\Settings $settings */

		$settings = $this->ioc['settings'];
		$api_key  = $settings->get( 'api_key' );
		if ( ! $api_key ) {
			return false;
		}
		$args = array(
			'zip'               => sanitize_text_field( $instance['zip'] ),
			'api_key'           => $api_key,
			'temperature_scale' => $instance['temperature_scale']
		);
		/** @var \EWW\Weather_Cache $weather */
		$weather = $this->ioc['cache'];
		$weather->set_container( $this->ioc )->init( $args );
		$data = $weather->get();
		if ( ! $data ) {
			return false;
		}
		/** @var \EWW\Icons\Icons $map */
		$map = $this->ioc['icons'];
		$map->set_container( $this->ioc );
		$data['icon_class']        = $map->get( $data['id'] );
		$data['temperature_scale'] = $this->translate_temperature_scale( $args['temperature_scale'] );
		$data['location_name']     = $instance['location_name'];


		?>
		<?php extract( $args ); ?>
		<?php if ( isset( $before_widget ) ) : ?>
			<?php echo $before_widget; ?>
		<?php endif; ?>
		<?php include( $template_file ); ?>
		<?php if ( isset( $after_widget ) ) : ?>
			<?php echo $after_widget; ?>
		<?php endif; ?>
		<?php

	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                      = array();
		$instance['zip']               = sanitize_text_field( str_replace( ' ', '', $new_instance['zip'] ) );
		$instance['temperature_scale'] = sanitize_text_field( $new_instance['temperature_scale'] );
		$instance['location_name']     = sanitize_text_field( $new_instance['location_name'] );

		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$defaults = array(
			'zip'               => null,
			'temperature_scale' => 'Imperial',
			'location_name'     => null

		);
		$instance = wp_parse_args( (array) $instance, $defaults );

		?>
		<div class="widget-form">
			<p>
				<label
					for="<?php echo $this->get_field_id( 'location_name' ); ?>"><?php _e( 'Location Name: ', $this->ioc['translate_domain'] ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'location_name' ); ?>"
				       name="<?php echo $this->get_field_name( 'location_name' ); ?>" type="text"
				       value="<?php echo esc_attr( $instance['location_name'] ); ?>"/>
				<small>This is just used as a label, I can include a lookup on the postal code in the future if I get
					enough requests
				</small>
			</p>
			<p>
				<label
					for="<?php echo $this->get_field_id( 'zip' ); ?>"><?php _e( 'Zip Code: ', $this->ioc['translate_domain'] ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'zip' ); ?>"
				       name="<?php echo $this->get_field_name( 'zip' ); ?>" type="text"
				       value="<?php echo $instance['zip']; ?>"/>
				<small>US and Canadian Zip/Postal codes work, This is what is used to obtain the weather</small>
			</p>
			<p>
				<label
					for="<?php echo $this->get_field_id( 'temperature_scale' ); ?>"><?php _e( "Temperature Scale", $this->ioc['translate_domain'] ); ?></label>
				<select id="<?php echo $this->get_field_id( 'temperature_scale' ); ?>"
				        name="<?php echo $this->get_field_name( 'temperature_scale' ); ?>" class="widefat"
				        style="width:100%;">
					<option value="Imperial" <?php if ( 'Imperial' == $instance['temperature_scale'] ) {
						echo 'selected="selected"';
					} ?>><?php _e( "Fahrenheit", $this->ioc['translate_domain'] ); ?></option>
					<option value="Metric" <?php if ( 'Metric' == $instance['temperature_scale'] ) {
						echo 'selected="selected"';
					} ?>><?php _e( "Celsius", $this->ioc['translate_domain'] ); ?></option>
					<option value="Kelvin" <?php if ( 'Kelvin' == $instance['temperature_scale'] ) {
						echo 'selected="selected"';
					} ?>><?php _e( "Kelvin", $this->ioc['translate_domain'] ); ?></option>
				</select>
			</p>

		</div>
		<?php
	}
}

