<?php

spl_autoload_register('myAutoloader');


function myAutoloader($className, $directory = null)
{
	if($directory)	{
    	$path = 'application/'. $directory . "/";
	}
    else {
    	$path = 'application/';
    }

    if(file_exists($path.$className.'.class.php')) {
    	include_once $path.$className.'.class.php';
    }
}

myAutoloader('load');
myAutoloader('model', 'models');
myAutoloader('user', 'models');
myAutoloader('controller', 'controllers');

new Controller();

?>