<?php
declare(strict_types=1);

namespace Vikto\CarProject\Controllers;

use Vikto\CarProject\Container\DIContainer;

class CarController
{
    public function __construct(private readonly DIContainer $container)
    {
    }

    public function list(): void
    {
        $cars = $this->container->get('Vikto\CarProject\Repositories\CarRepository')->getAll();

        require __DIR__ . '/../../views/car/list.php';
    }

    public function details(): void
    {
        $carObj = $this->container->get('Vikto\CarProject\Repositories\CarRepository')->getByRegistrationId();

        require __DIR__ . '/../../views/car/details.php';
    }
}