<?php
declare(strict_types=1);

namespace Vikto\CarProject\Framework;

use Vikto\CarProject\Controllers\CarController;
use Vikto\CarProject\Controllers\HomePageController;

class Router
{
    public function __construct(
        private HomePageController $homePageController,
        private CarController $carController)
    {}

    public function process(string $request)
    {
        switch ($request) {
            case '':
            case '/':
                echo $this->homePageController->renderHomePage();
                break;
            case '/car/list':
                echo $this->carController->list();
                break;
            case '/car/details':
                echo $this->carController->details();
                break;
            default:
                http_response_code(404);
                echo $this->homePageController->renderNotFoundPage();
                break;
        }
    }
}