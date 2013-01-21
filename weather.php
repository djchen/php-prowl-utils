<?php
/*
	Simple script to send a prowl notification of the day's weather
*/

ini_set('display_errors', 'on');

require_once('inc/defaults.config.php');
require_once('inc/class.prowl.php');

try {
	$prowl = new Prowl(array(
		'apiKey' => $config['apiKey']
	));

	$weather = file_get_contents('http://api.wunderground.com/auto/wui/geo/ForecastXML/index.xml?query=' . $config['weather']['location']);
	$weather = simplexml_load_string($weather);

	$notification = array(
		'application' => 'Weather',
		'event' => $weather->txt_forecast->forecastday->title,
		'description' => $weather->txt_forecast->forecastday->fcttext,
		'priority'  => -2
	);

	$message = $prowl->add($notification);
	exit;
} catch (Exception $message) {
	echo 'Exception: ' . $message->getMessage();
	exit(99);
}
