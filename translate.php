<?php 

class easy_weather_widget_load_language {
    public function __construct() {
        add_action('init', array($this, 'load_my_transl'));
    }

     public function load_my_transl() {
        load_plugin_textdomain( 'easy_weather_widget', FALSE, dirname(plugin_basename(__FILE__)).'/languages/' );
    }
}

$translate = new easy_weather_widget_load_language;