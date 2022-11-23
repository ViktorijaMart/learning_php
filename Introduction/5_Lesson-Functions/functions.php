<?php

echo pow(2, 3);

echo '<br>';

/////////////////////////////////////////////

$numberCc = 10;
echo addNumbers($numberCc);
function addNumbers($numberC): int
{
    $numberA = 1;
    $numberB = 5;

    return $numberA + $numberB + $numberC;
}

echo '<br>';
///////////////////////////////////////////////
function greeting(string $name): string
{
    return "Hello, my name is $name";
}

echo greeting('Victoria');

echo '<br>';
//////////////////////////////////////////////////
function toUpperCase(string $name): string
{
    return strtoupper($name);
}

echo toUpperCase('viktorija');

echo '<br>';
///////////////////////////////////////////////
function firstLetterToUpperCase(string $name): string
{
    return ucfirst($name);
}

echo firstLetterToUpperCase('victoria');

echo '<br>';
/////////////////////////////////////////////////
function fixName(string $name): string
{
    return ucfirst(strtolower($name));
}

echo fixName('VIKTORIJA');

echo '<br>';

//////////////////////////////////////////////////////////////////
//Sukurkite funkcija 'negative', kuri priimtu viena argumenta "$skaicius" ir isvestu i ekrana atitinkama neigiama skaiciu. (Ivedame 3 -> isveda -3);
function toNegative(int $num): int
{
    return -$num;
}

echo toNegative(5);

echo '<br>';

//////////////////////////////////////////////////////////////////
//Sukurkite funkcija 'kauliukas', kuri imituotu kauliuko metima. (I ekrana atspaudintu atsitiktiti skaiciu nuo 1 iki 6) (hint: rand);
function rollTheDice(): int
{
    return rand(1, 6);
}

echo rollTheDice();

echo '<br>';

//////////////////////////////////////////////////////////////////
//Sukurkite funkcija 'arEsiDarJaunas', kuri priimtu viena argumenta "$amzius" ir i ekrana isvestu pranesima, kiek metu truksta iki 100. (Pvz.: "Iki simto jums truksta 70 metu! Dar gyventi liko daug!")
function areYouStillYoung(int $age): string
{
    $toHundred = 100 - $age;
    return "It will take you $toHundred years to be a 100 years old. You are still so young, darling.";
}

echo areYouStillYoung(25);

echo '<br>';

//////////////////////////////////////////////////////////////////
// Parasykite funkcija 'pasisveikinimas', kuri priimtu 1 argumentas "$vardas" ir isvestu pranesima pvz.: " Labas JONAS!". Varda turetu isvesti didziosiomis raidemis, nepriklausomai nuo to, ar paduodame mazosiom ar didziosiomis. (hint: strtoupper)
function greetingAgain(string $name): string
{
    $nameToUpperCase = strtoupper($name);
    return "Hey, $nameToUpperCase!";
}

echo greetingAgain('victoria');

echo '<br>';

//////////////////////////////////////////////////////////////////
///Parasykite funkcija 'pusePloto', kuri priimtu 2 argumentus $a ir $b ir isvestu i ekrana puse abieju skaiciu sandaugos.
function halfArea(int $a, int $b): float
{
    return $a * $b / 2;
}

echo halfArea(3, 5);

echo '<br>';

//////////////////////////////////////////////////////////////////
///Parasykite funkcija 'kiekLaiko', kuri priimtu viena argumenta "$valandos" ir isvestu i ekrana, kiek sitame laiko tarpe yra pilnu dienu ir valandu. Pvz ivedame 26 --> gauname "1 diena(-u) ir 2 valandos(-u)" (hint floor)
function hoursToDays(int $hours): void
{
    $days = floor($hours / 24);
    $hoursLeft = $hours % 24;
    echo "$days day/days and $hoursLeft hour/hours.";
}

hoursToDays(52);

echo '<br>';
