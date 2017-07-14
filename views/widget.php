<div class="eww__clearfix eww__wrap">
	<ul>
		<li>
			<div class="eww__image">
				<div><span class="eww__icon <?php esc_attr_e( $data['icon_class']['icon']['day'] ) ?>"></span>
				</div>
			</div>
			<div class="eww__data">
				<p class="eww__bold eww__title"><?php esc_html_e( $data['location_name'] ); ?></p>
				<p class="eww__limited-margin eww__bold"><?php _e( "Currently", $this->ioc['translate_domain'] ); ?></p>
				<p class="eww__limited-margin"><?php _e( ucwords( $data['description'] ), $this->ioc['translate_domain'] ); ?></p>
				<p class="eww__limited-margin"><?php echo round( $data['temp'] ); ?><?php esc_html_e( $data['temperature_scale'] ); ?></p>
				<small>Data: <a target="_BLANK" href="http://openweathermap.org/api">OpenWeathermap API</a></small>
			</div>
		</li>
	</ul>
</div>