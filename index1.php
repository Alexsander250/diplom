<?php
header('Content-Type: text/html; charset=utf-8');
    include 'controller.php';
    include 'vendor/autoload.php';
    $controller = new Controller;
    $controller->menu();

?>