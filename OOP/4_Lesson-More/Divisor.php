<?php
declare(strict_types=1);

class Divisor
{
    public function __construct(private int $x)
    {
    }

    public function __invoke($divisor): array
    {
        $numbers = [];

        for ($i = 1; $i <= $this->x; $i++) {
            if ($i % $divisor === 0) {
                $numbers[] = $i;
            }
        }

        return $numbers;
    }
}

echo '<pre>';
$divisor = new Divisor(1000);
print_r($divisor(10));

/*
Sukurkite klasę, kuri masyvo formatu grąžintų visus skaičius nuo 1 iki X, kurie dalijasi iš tam tikro skaičiaus.
Klasė turi būti iškviečiama kaip funkcija, daliklis paduodamas kaip argumentas.
Skaičius X turi būti paduodamas per konstruktorių. Skaičius turi būti teigiamas.
$divisor = new Divisor(1000);
print_r($divisor(10));
[
    10,
    20,
    ...
]
*/
