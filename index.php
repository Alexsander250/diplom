<?php

use core\Router;

spl_autoload_register(function($class){
$path = str_replace('\\', '\\', $class.'.php');
if (file_exists($path))
{
    require $path;
    echo $path;
}

});
require 'core\Router.php';
$router = new Router;
$router->run();
?>
