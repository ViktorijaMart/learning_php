<?php
declare(strict_types=1);

namespace Vikto\CarProject\Models;

class Car
{
    private string $registrationId;
    private string $manufacturer;
    private string $model;
    private int $year;

    public function getRegistrationId(): string
    {
        return $this->registrationId;
    }

    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getYear(): int
    {
        return $this->year;
    }
}
