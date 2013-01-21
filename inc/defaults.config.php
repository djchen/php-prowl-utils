<?php
/*
	Default configuration values
	Its recommended you create a config.php inside this directory
	with your configuration values which override the defaults
*/

$config = array();

// Prowl API Key
//$config['apiKey'] = '';

//
// Weather Configuration
//

$config['weather'] = array();
$config['weather']['location'] = '94102';

if (file_exists(dirname(__FILE__) . '/config.php')) {
        require(dirname(__FILE__) . '/config.php');
}
