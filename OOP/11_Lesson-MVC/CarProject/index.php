<?php
declare(strict_types=1);

require_once './vendor/autoload.php';

use Vikto\CarProject\Container\DIContainer;
use Vikto\CarProject\Framework\Router;

// Load custom DI container
$container = new DIContainer();
$container->loadDependencies();

// Use custom Router
$request = str_replace('/Paskaitos/OOP/11_Lesson-MVC/CarProject', '', $_SERVER['REQUEST_URI']);
$router = $container->get(Router::class);
$router->process($request);