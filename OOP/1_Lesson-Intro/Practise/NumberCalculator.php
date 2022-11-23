<?php

/*
Sukurkite klasę NumberCalculator, kuri leistų atlikti įvairius skaičiavimo veiksmus. Ši klasė neturės konstruktoriaus.
Metodai:
- addNumber - metodas priims "int" tipo argumentą, return tipas bus "void"
- calculateSum - metodas grąžins "int" tipo reikšmę, argumentų neturės
- calculateProduct - product liet. sandauga. Metodas grąžins "int" tipo reikšmę, argumentų neturės
- calculateAverage - suapvalinkite iki sveiko skaičiaus, į viršų. Metodas grąžins "int" tipo reikšmę, argumentų neturės
Nepamirškite sudėti tipų argumentams bei return'ams.
Kodo kvietimo pavyzdys:
$numberCalculator = new NumberCalculator();
echo $numberCalculator->calculateSum(); // 0
$numberCalculator->addNumber(5);
$numberCalculator->addNumber(7);
echo $numberCalculator->calculateSum(); // 12
*/

class NumberCalculator
{
    private array $numbers = [];

    public function addNumber(int $number): void
    {
        $this->numbers[] = $number;
    }

    public function calculateSum(): int
    {
        return array_sum($this->numbers);
    }

    public function calculateProduct(): int
    {
        return ($this->numbers) ? array_product($this->numbers) : 0;
    }

    public function calculateAverage(): int
    {
        $sum = $this->calculateSum();
        $count = count($this->numbers);

        return ($this->numbers) ? round($sum/$count) : 0;
    }
}

$numberCalculator = new NumberCalculator();
echo $numberCalculator->calculateSum() . '<br>';
echo $numberCalculator->calculateProduct() . '<br>';
echo $numberCalculator->calculateAverage() . '<hr>';
$numberCalculator->addNumber(5);
$numberCalculator->addNumber(7);
$numberCalculator->addNumber(7);
echo $numberCalculator->calculateSum() . '<br>';
echo $numberCalculator->calculateProduct() . '<br>';
echo $numberCalculator->calculateAverage() . '<br>';