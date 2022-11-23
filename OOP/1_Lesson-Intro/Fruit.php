<?php

class Fruit
{
    // Properties
    // usually are set as private
    public string $name;
    private string $color;

    // Methods
    // $this can only be accessed in methods
    public function setName(string $name): Fruit
    {
        $this->name = $name;
        return $this; // return whole object
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    // to be able to see private properties outside a class
    public function getColor(): string
    {
        return $this->color;
    }
}

$apple = new Fruit();
// this setting of a property only possible with public properties
$apple->name = 'Apple';

// private properties can be accessed only inside a class
//$apple->color = 'Red';
// to set a private property you need to use methods
$apple->setColor('red');
// to see a private property you also need to use a method
echo $apple->getColor();


