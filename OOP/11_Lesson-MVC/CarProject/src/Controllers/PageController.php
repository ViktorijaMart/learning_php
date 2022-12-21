<?php
declare(strict_types=1);

namespace Vikto\CarProject\Controllers;

class PageController
{
    public function renderHomePage(): void
    {
        require __DIR__ . '/../../views/index.php';
    }

    public function renderNotFoundPage(): void
    {
        require __DIR__ . '/../../views/error/error.php';
    }
}
