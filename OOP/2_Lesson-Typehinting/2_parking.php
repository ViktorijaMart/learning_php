<?php
declare(strict_types=1);

/*
Sukurkite programą skirtą valdyti parkingą. Naudokite objektinį programavimą t.y. klases.
Turbūt pakaks dviejų klasių - Parking ir Car. Duomenys turi būti saugomi faile.
---------------------------------------------
php -f parking.php park_car NKA_123
Car ABC_123 parked!
---------------------------------------------
php -f parking.php park_car FTA_122
Car FTA_122 parked!
---------------------------------------------
php -f parking.php list_cars
Parked cars:
NKA_123
FTA_122
*/

class Car
{
    private string $car;

    public function __construct(string $car)
    {
        $this->car = $car;
    }

    public function getCar(): string
    {
        return $this->car;
    }
}

class Parking
{
    private const PARKED_CARS_FILE_PATH = './parkedCars.json';

    public function parkCar(Car $car): void
    {
        $parkedCars = $this->getParkedCars();
        $parkedCars[] = $car->getCar();
        $this->updateParkedCars($parkedCars);
    }

    private function getParkedCars(): array
    {
        return json_decode(file_get_contents(self::PARKED_CARS_FILE_PATH), true);
    }

    private function updateParkedCars(array $parkedCars): void
    {
        file_put_contents(self::PARKED_CARS_FILE_PATH, json_encode($parkedCars, JSON_PRETTY_PRINT));
    }

    public function listCars(): void
    {
        $list = 'Parked cars:' . '<br>';

        foreach ($this->getParkedCars() as $car)
        {
            $list .= $car . '<br>';
        }

        echo $list;
    }

    public function carLeft(string $carLeaving): void
    {
        $parkedCars = $this->getParkedCars();

        foreach ($parkedCars as $car) {
            if ($car === $carLeaving) {
                $parkedCars = array_diff($parkedCars, [$car]);
            }
        }

        $this->updateParkedCars($parkedCars);
    }
}
// car NKA_123 parked
$parking = new Parking();
$car1 = new Car('NKA_123');
$parking->parkCar($car1);
// car FTA_122 parked
$car2 = new Car('FTA_122');
$parking->parkCar($car2);
$parking->listCars();
// car NKA_123 left
$parking->carLeft('NKA_123');
echo '<hr>';
$parking->listCars();
// car BLA_123 parked
$car3 = new Car('BLA_123');
$parking->parkCar($car3);
echo '<hr>';
$parking->listCars();
// car KLA_987 parked
$car4 = new Car('KLA_987');
$parking->parkCar($car4);
echo '<hr>';
$parking->listCars();
// car FTA_122 left
$parking->carLeft('FTA_122');
echo '<hr>';
$parking->listCars();