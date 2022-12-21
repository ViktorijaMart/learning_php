<?php
declare(strict_types=1);

namespace Vikto\CarProject\Repositories;

use Vikto\CarProject\Container\DIContainer;
use Vikto\CarProject\Models\Car;

class CarRepository
{
    private const JSON_PATH = __DIR__ . '/../Files/cars.json';

    public function __construct(private readonly DIContainer $container)
    {
    }

    public function getByRegistrationId(string $registrationId): Car
    {
        $carsArray = $this->decodeJSON();

        /* @var Car $carObj
         */
        foreach ($carsArray as $car) {
            if ($car["registrationId"] === $registrationId) {
                $carObj = $this->container->get('Vikto\CarProject\Models\Car');
                $carObj->setRegistrationId($car["registrationId"]);
                $carObj->setManufacturer($car['manufacturer']);
                $carObj->setModel($car['model']);
                $carObj->setYear($car['year']);
            }
        }

        if (!isset($carObj)) {
            throw new \Exception('There is no car with ' . $registrationId . ' registration ID');
        }

        return $carObj;
    }

    public function getAll(): array
    {
        $carsArray = $this->decodeJSON();

        $carsObjArray = [];

        foreach ($carsArray as $car) {
            $carObj = $this->container->get('Vikto\CarProject\Models\Car');
            $carObj->setRegistrationId($car["registrationId"]);
            $carObj->setManufacturer($car['manufacturer']);
            $carObj->setModel($car['model']);
            $carObj->setYear($car['year']);

            $carsObjArray[] = $carObj;
        }

        return $carsObjArray;
    }

    public function decodeJSON(): array
    {
        return json_decode(file_get_contents(self::JSON_PATH), true);
    }
}
