<?php

/*
Sukurkite klasę, kuri skaičiuotų keturkampio plotą, perimetrą ir įstrižainę.
Klasės pavadinimas: Rectangle
Į konstruktorių paduodama: int $length, int $width
Metodai:
- calculateArea()
- calculatePerimeter()
- calculateDiagonal()
Metodai turi grąžinti suapvalintą (į viršų) int tipo reikšmę. Pridėkite return tipą metodams.
*/

class Rectangle
{
    private int $length;
    private int $width;

    public function __construct(int $length, int $width)
    {
        $this->length = $length;
        $this->width = $width;
    }

    public function calculateArea(): int
    {
        return round($this->length * $this->width);
    }

    public function calculatePerimeter(): int
    {
        return round(($this->length + $this->width) * 2);
    }

    public function calculateDiagonal(): int
    {
        $squaredLength = pow($this->length, 2);
        $squaredWidth = pow($this->width, 2);

        return round(sqrt($squaredLength + $squaredWidth));
    }
}

$rectangle1 = new Rectangle(4, 5);

echo $rectangle1->calculateArea() . '<br>';
echo $rectangle1->calculatePerimeter() . '<br>';
echo $rectangle1->calculateDiagonal() . '<br>';