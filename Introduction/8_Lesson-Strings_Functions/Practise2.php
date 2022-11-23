<?php
echo '<pre>';
//1. Prisiminkime laisvo kritimo formulę. Laisvo kritimo pagreitis (g) lygus 9.844. t = laikas sekundemis. s = atstumas metrais. Parašyki funkciją, kuri priimtu vieną argumentą "$laikas" ir gražintu atstumą, kurį įveiks kūnas krisdamas per $laikas sekundžių išmestas be pradinio greičio.
// s = gt^2

function letsFallDown(float $time): float
{
    return 9.844 * pow($time, 2) / 2;
}

//a) Atlykime skaičiavumus su duomenimis 5 ,15, 20, 27.

echo letsFallDown(3);
echo '<br>';
echo letsFallDown(15);
echo '<br>';
echo letsFallDown(20);
echo '<br>';
echo letsFallDown(27);
echo '<br>';

//b) Pateikime rezultatus į ekraną "Kūnas per 2 sekundes nuskris 20m"

function fallingResult(float $time, float $result): string
{
    return 'The body falling down for ' . $time . ' seconds will fall ' . $result . ' meters.';
}

echo fallingResult(5, letsFallDown(5));
echo '<br>';
echo fallingResult(15, letsFallDown(15));
echo '<br>';
echo fallingResult(20, letsFallDown(20));
echo '<br>';
echo fallingResult(27, letsFallDown(27));
echo '<br>';

//c) Išveskime visų skaičiavimų suma, pvz. "Visi kūnai kartu kirįsdami iveiks 800m kelią"

echo 'All bodies will fall together ' . letsFallDown(5) + letsFallDown(15) + letsFallDown(20) + letsFallDown(27) . ' meters';
echo '<hr>';

//2. Parašykite funkcija, kur priimti vieną argumentą - skaičiu ir pasakytu ar šitas skaičius yra pirminis ar ne.

function isPrimary(int $number): string
{
    $result = $number . ' is prime number';

    for ($i = $number - 1; $i > 1; --$i) {
       if ($number % $i === 0) {
           $result = $number . ' is not prime number';
       }
   }

   return $result;
}

echo isPrimary(11);
echo '<hr>';

//3. Parasykite funkcja, kuri priimtu viena argumenta - masyva skaiciu ir grazintu suma visu skaiciu, kurie dalinasi is 2. (%)

function sumOfEvenNumbers(array $array): ?int
{
    function sumOfEven($acc, $num)
    {
        if ($num % 2 === 0) {
            $acc += $num;}
        return $acc;
    }

    return array_reduce($array, "sumOfEven");
}

echo sumOfEvenNumbers([1, 2, 3, 4, 5, 10, 6]);
echo '<hr>';

//4. Parasykite funkcja, kuri mestu kauliuka iki kol iskris 5 arba 6. Visus savo metimus isvestu i ekrana.

function untilFiveOrSix(): void
{
    $number = 0;
    while ($number < 5) {
        $number = rand(1, 6);
        echo $number . '<br>';
    }
}

untilFiveOrSix();
echo '<hr>';

//5. Sukurkite funkcija, kuri priimtu masyva vardu ir grazintu masyva su visais vardais kurie prasideda raide J arba M
$arrayOfNames = ['matas', 'Karolis', 'Jonas', 'Vytis'];

function startsWithJOrM(array $array): array
{
    $nameStartsWithJorM = [];

    foreach ($array as $name) {
        $name = ucfirst($name);
        if ($name[0] === 'J' || $name[0] === 'M') {
            $nameStartsWithJorM[] = $name;
        }
    }
    return $nameStartsWithJorM;
}

print_r(startsWithJOrM($arrayOfNames));

//6. Sukurkite funkcija, kuri priimtu masyva vardu ir grazintu masyva su visais vardais kurie turi raides o a s (strpos)

function hasLettersOAS(array $array): array
{
    $hasLettersOAS = [];

    foreach ($array as $name) {
        if (stripos($name, 'o') || stripos($name, 'a') || stripos($name, 's')) {
            $hasLettersOAS[] = $name;
        }
    }
    return $hasLettersOAS;
}

print_r(hasLettersOAS(['jOnas', 'Petrute', 'Viktorija', 'Linas', 'Klim']));

//7. Parasykite funkcija, kuri priimtu viena parametra - pastraipa ir ismestu is jos visus sakinius, kurie trumpesnis nei 5 zodziai. (explode, count)

$paragraph = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Trumpas sakinys vienas. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Trumpas sakinys du. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';

function removeShortSentences(string $paragraph): void
{
    $longSentenceArray = [];
    $sentencesDivided = explode('.', $paragraph);

    foreach ($sentencesDivided as $sentence) {
        $wordsArray = explode(' ', $sentence);
        if (count($wordsArray) > 5) {
            $longSentenceArray[] = implode(' ', $wordsArray);
        }
    }
    echo implode('.', $longSentenceArray);
}

removeShortSentences($paragraph);

//8. Parasykite funkcija, kuri priimtu viena parametra - pastraipa ir grazintu masyva sakiniu, kuriuose yra zodis 'grazus' (explode, strpos, strtolower)

