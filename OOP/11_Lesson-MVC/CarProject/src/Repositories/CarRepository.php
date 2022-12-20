<?php
declare(strict_types=1);

namespace Vikto\CarProject\Repositories;

class CarRepository
{
    private const CARS = [
        [
            'registrationId' => '1',
            'manufacturer' => 'BMW',
            'model' => '330',
            'year' => 2007
        ],
        [
            'registrationId' => '2',
            'manufacturer' => 'Renault',
            'model' => 'Scenic',
            'year' => 2006
        ],
        [
            'registrationId' => '3',
            'manufacturer' => 'Audi',
            'model' => 'A3',
            'year' => 2005
        ],
        [
            'registrationId' => '4',
            'manufacturer' => 'Volkswagen',
            'model' => 'Golf',
            'year' => 2017
        ],
        [
            'registrationId' => '5',
            'manufacturer' => 'BMW',
            'model' => '535',
            'year' => 2012
        ],
        [
            'registrationId' => '6',
            'manufacturer' => 'Mercedes-Benz',
            'model' => 'S500',
            'year' => 2014
        ],
        [
            'registrationId' => '7',
            'manufacturer' => 'Nissan',
            'model' => 'Qashqai',
            'year' => 2008
        ],
        [
            'registrationId' => '8',
            'manufacturer' => 'Mini',
            'model' => 'Cooper',
            'year' => 2009
        ],
        [
            'registrationId' => '9',
            'manufacturer' => 'Citroen',
            'model' => 'C5',
            'year' => 2009
        ],
        [
            'registrationId' => '10',
            'manufacturer' => 'Volkswagen',
            'model' => 'Transporter',
            'year' => 2011
        ]
    ];

    public function getByRegistrationId(string $registrationId): array
    {
        $carWithGivenRegistrationId = [];

        foreach (self::CARS as $car) {
            if ($car['registrationId'] === $registrationId) {
                $carWithGivenRegistrationId = $car;
            }
        }

        return $carWithGivenRegistrationId;
    }

    public function getAll(): array
    {
        return self::CARS;
    }
}
