<?php

namespace EWW\Icons;
use EWW\Iocable\Iocable;

/**
 * Class Font_Map
 * Maps response codes from openweathermap.org to fonts in the Weather Icons set from Erik Flowers (https://erikflowers.github.io/weather-icons/)
 * @package EWW
 */
class Weather_Icons extends Iocable implements Icons {



	public function get( $code ) {

		$codes = $this->get_codes();

		return isset( $codes[ $code ] ) ? $codes[ $code ] : false;

	}

	public function get_codes() {

		return apply_filters( 'easy_weather_widget_icons', array(

				200 => array(
					'text' => __( 'thunderstorm with light rain', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-storm-showers', 'night' => 'wi wi-night-alt-storm-showers', )
				),
				201 => array(
					'text' => __( 'thunderstorm with rain', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-thunderstorm', 'night' => 'wi wi-night-alt-thunderstorm', )
				),
				202 => array(
					'text' => __( 'thunderstorm with heavy rain', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-thunderstorm', 'night' => 'wi wi-night-alt-thunderstorm', )
				),
				210 => array(
					'text' => __( 'light thunderstorm', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-storm-showers', 'night' => 'wi wi-night-alt-storm-showers', )

				),
				211 => array(
					'text' => __( 'thunderstorm', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-thunderstorm', 'night' => 'wi wi-night-alt-thunderstorm', )
				),
				212 => array(
					'text' => __( 'heavy thunderstorm', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-thunderstorm', 'night' => 'wi wi-night-alt-thunderstorm', )
				),
				221 => array(
					'text' => __( 'ragged thunderstorm', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-thunderstorm', 'night' => 'wi wi-night-alt-thunderstorm', )
				),
				230 => array(
					'text' => __( 'thunderstorm with light drizzle', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-storm-showers', 'night' => 'wi wi-night-alt-storm-showers', )
				),
				231 => array(
					'text' => __( 'thunderstorm with drizzle', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-storm-showers', 'night' => 'wi wi-night-alt-storm-showers', )
				),
				232 => array(
					'text' => __( 'thunderstorm with heavy drizzle', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-thunderstorm', 'night' => 'wi wi-night-alt-thunderstorm', )
				),


				300 => array(
					'text' => __( 'light intensity drizzle', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-sprinkle', 'night' => 'wi wi-night-sprinkle', )
				),
				301 => array(
					'text' => __( 'drizzle', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-sprinkle', 'night' => 'wi wi-night-sprinkle', )
				),
				302 => array(
					'text' => __( 'heavy intensity drizzle', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-sprinkle', 'night' => 'wi wi-night-sprinkle', )
				),
				310 => array(
					'text' => __( 'light intensity drizzle rain', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-sprinkle', 'night' => 'wi wi-night-sprinkle', )
				),
				311 => array(
					'text' => __( 'drizzle rain', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-sprinkle', 'night' => 'wi wi-night-sprinkle', )
				),
				312 => array(
					'text' => __( 'heavy intensity drizzle rain', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-sprinkle', 'night' => 'wi wi-night-sprinkle', )
				),
				313 => array(
					'text' => __( 'shower rain and drizzle', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-sprinkle', 'night' => 'wi wi-night-sprinkle', )
				),
				314 => array(
					'text' => __( 'heavy shower rain and drizzle', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-rain', 'night' => 'wi wi-night-rain', )
				),
				321 => array(
					'text' => __( 'shower drizzle', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-sprinkle', 'night' => 'wi wi-night-sprinkle', )
				),


				500 => array(
					'text' => __( 'light rain', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-sprinkle', 'night' => 'wi wi-night-sprinkle', )
				),
				501 => array(
					'text' => __( 'moderate rain', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-rain', 'night' => 'wi wi-night-rain', )
				),
				502 => array(
					'text' => __( 'heavy intensity rain', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-rain', 'night' => 'wi wi-night-rain', )
				),
				503 => array(
					'text' => __( 'very heavy rain', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-rain', 'night' => 'wi wi-night-rain', )
				),
				504 => array(
					'text' => __( 'extreme rain', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-rain', 'night' => 'wi wi-night-rain', )
				),
				511 => array(
					'text' => __( 'freezing rain', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-sleet', 'night' => 'wi wi-night-sleet', )
				),
				520 => array(
					'text' => __( 'light intensity shower rain', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-sprinkle', 'night' => 'wi wi-night-sprinkle', )
				),
				521 => array(
					'text' => __( 'shower rain', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-sprinkle', 'night' => 'wi wi-night-sprinkle', )
				),
				522 => array(
					'text' => __( 'heavy intensity shower rain', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-rain', 'night' => 'wi wi-night-rain', )
				),
				531 => array(
					'text' => __( 'ragged shower rain', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-sprinkle', 'night' => 'wi wi-night-sprinkle', )
				),


				600 => array(
					'text' => __( 'light snow', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-snow', 'night' => 'wi wi-night-snow', )
				),
				601 => array(
					'text' => __( 'snow', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-snow', 'night' => 'wi wi-night-snow', )
				),
				602 => array(
					'text' => __( 'heavy snow', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-snow', 'night' => 'wi wi-night-snow', )
				),
				611 => array(
					'text' => __( 'sleet', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-sleet', 'night' => 'wi wi-night-sleet', )
				),
				612 => array(
					'text' => __( 'shower sleet', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-sleet', 'night' => 'wi wi-night-sleet', )
				),
				615 => array(
					'text' => __( 'light rain and snow', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-rain-mix', 'night' => 'wi wi-night-rain-mix', )
				),
				616 => array(
					'text' => __( 'rain and snow', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-rain-mix', 'night' => 'wi wi-night-rain-mix', )
				),
				620 => array(
					'text' => __( 'light shower snow', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-snow', 'night' => 'wi wi-night-snow', )
				),
				621 => array(
					'text' => __( 'shower snow', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-snow', 'night' => 'wi wi-night-snow', )
				),
				622 => array(
					'text' => __( 'heavy shower snow', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-snow', 'night' => 'wi wi-night-snow', )
				),


				701 => array(
					'text' => __( 'mist', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-showers', 'night' => 'wi wi-showers', )
				),
				711 => array(
					'text' => __( 'smoke', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-smoke', 'night' => 'wi wi-smoke', )
				),
				721 => array(
					'text' => __( 'haze', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-haze', 'night' => 'wi wi-day-haze', )
				),
				731 => array(
					'text' => __( 'sand, dust whirls', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-dust', 'night' => 'wi wi-dust', )
				),
				741 => array(
					'text' => __( 'fog', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-fog', 'night' => 'wi wi-fog', )
				),
				751 => array(
					'text' => __( 'sand', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-sandstorm', 'night' => 'wi wi-sandstorm', )
				),
				761 => array(
					'text' => __( 'dust', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-dust', 'night' => 'wi wi-dust', )
				),
				762 => array(
					'text' => __( 'volcanic ash', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-volcano', 'night' => 'wi wi-volcano', )
				),
				771 => array(
					'text' => __( 'squalls', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-cloudy-gusts', 'night' => 'wi wi-cloudy-gusts', )
				),
				781 => array(
					'text' => __( 'tornado', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-tornado', 'night' => 'wi wi-tornado', )
				),


				800 => array(
					'text' => __( 'clear sky', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-sunny', 'night' => 'wi wi-night-clear', )
				),


				801 => array(
					'text' => __( 'few clouds', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-cloudy', 'night' => 'wi wi-night-partly-cloudy', )
				),
				802 => array(
					'text' => __( 'scattered clouds', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-cloudy', 'night' => 'wi wi-night-partly-cloudy', )
				),
				803 => array(
					'text' => __( 'broken clouds', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-cloudy', 'night' => 'wi wi-night-partly-cloudy', )
				),
				804 => array(
					'text' => __( 'overcast clouds', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-cloud', 'night' => 'wi wi-cloud', )
				),


				900 => array(
					'text' => __( 'tornado', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-tornado', 'night' => 'wi wi-tornado', )
				),
				901 => array(
					'text' => __( 'tropical storm', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-hurricane', 'night' => 'wi wi-hurricane', )
				),
				902 => array(
					'text' => __( 'hurricane', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-hurricane', 'night' => 'wi wi-hurricane', )
				),
				903 => array(
					'text' => __( 'cold', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-snowflake-cold', 'night' => 'wi wi-snowflake-cold', )
				),
				904 => array(
					'text' => __( 'hot', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-hot', 'night' => 'wi wi-hot', )
				),
				905 => array(
					'text' => __( 'windy', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-windy', 'night' => 'wi wi-windy', )
				),
				906 => array(
					'text' => __( 'hail', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-hail', 'night' => 'wi wi-night-hail', )
				),


				951 => array(
					'text' => __( 'calm', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-sunny', 'night' => 'wi wi-night-clear', )
				),
				952 => array(
					'text' => __( 'light breeze', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-light-wind', 'night' => 'wi wi-night-alt-cloudy-windy', )
				),
				953 => array(
					'text' => __( 'gentle breeze', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-light-wind', 'night' => 'wi wi-night-alt-cloudy-windy', )
				),
				954 => array(
					'text' => __( 'moderate breeze', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-light-wind', 'night' => 'wi wi-night-alt-cloudy-windy', )
				),
				955 => array(
					'text' => __( 'fresh breeze', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-light-wind', 'night' => 'wi wi-night-alt-cloudy-windy', )
				),
				956 => array(
					'text' => __( 'strong breeze', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-windy', 'night' => 'wi wi-night-cloudy-windy', )
				),
				957 => array(
					'text' => __( 'high wind, near gale', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-windy', 'night' => 'wi wi-night-cloudy-windy', )
				),
				958 => array(
					'text' => __( 'gale', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-windy', 'night' => 'wi wi-night-cloudy-windy', )
				),
				959 => array(
					'text' => __( 'severe gale', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-windy', 'night' => 'wi wi-night-cloudy-windy', )
				),
				960 => array(
					'text' => __( 'storm', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-storm-showers', 'night' => 'wi wi-night-storm-showers', )
				),
				961 => array(
					'text' => __( 'violent storm', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-day-thunderstorm', 'night' => 'wi wi-night-thunderstorm', )
				),
				962 => array(
					'text' => __( 'hurricane', $this->ioc['translate_domain'] ),
					'icon' => array( 'day' => 'wi wi-hurricane', 'night' => 'wi wi-hurricane', )
				),


			)
		);

	}

}