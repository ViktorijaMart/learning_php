<?php
declare(strict_types=1);

namespace Vikto\CarProject\Framework;


use Vikto\CarProject\Container\DIContainer;
use Vikto\CarProject\Controllers\CarController;
use Vikto\CarProject\Controllers\PageController;

class Router
{
    public function __construct(private readonly DIContainer $container)
    {}

    public function process(string $request)
    {
        /* @var CarController $carController
         * @var PageController $pageController
         */

        $carController = $this->container->get('Vikto\CarProject\Controllers\CarController');
        $pageController = $this->container->get('Vikto\CarProject\Controllers\PageController');

        switch ($request) {
            case '':
            case '/':
                $pageController->renderHomePage();
                break;
            case '/car/list':
                $carController->list();
                break;
            case '/car/details':
                $carController->details($this->getRegistrationId());
                break;
            default:
                http_response_code(404);
                $pageController->renderNotFoundPage();
                break;
        }
    }

    public function getRegistrationId(): string
    {
        return $_POST["registrationId"];
    }
}