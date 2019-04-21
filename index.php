<?php
//  $f3->set ("HOME", __DIR__);
// Kickstart the framework
$f3=require('lib/base.php');

$f3->set('DEBUG',1);
if ((float)PCRE_VERSION<7.9)
	trigger_error('PCRE version is out of date');

// Load configuration
$f3->config('config.ini');
$f3->set("AUTOLOAD", "handlers/;models/;");

$f3->route('GET /', 'homeController->home');

$f3->run();
