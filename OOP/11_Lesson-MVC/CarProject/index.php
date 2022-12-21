<?php
declare(strict_types=1);

require_once './vendor/autoload.php';

use Vikto\CarProject\Container\DIContainer;

$request = str_replace('/Paskaitos/OOP/11_Lesson-MVC/CarProject', '', $_SERVER['REQUEST_URI']);

// Load custom DI container
$container = new DIContainer();

// Use custom Router

try {
    $router = $container->get('Vikto\CarProject\Framework\Router');
    $router->process($request);
} catch (Exception $e) {
    echo $e->getMessage();
}
