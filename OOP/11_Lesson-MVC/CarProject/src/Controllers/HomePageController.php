<?php
declare(strict_types=1);

namespace Vikto\CarProject\Controllers;

class HomePageController
{
    public function renderHomePage(): string
    {
        return '<h1>Welcome to our home page</h1>';
    }

    public function renderNotFoundPage(): string
    {
        return '<h1>Page not found</h1>';
    }
}
