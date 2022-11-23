<?php
echo '<pre>';

function getShoppingCart(): array
{
    return [
        'products' => [
            'Comfy chair' => 'no data',
            'Yellow lamp' => [
                'price' => 15.3,
                'quantity' => 2,
            ],
            'Didzioji sofa' => [
                'pavadinimas' => 'Didzioji sofa',
                'kaina' => 'trylika eurų'
            ],
            'Softest rug' => [
                'price' => 27.3,
                'quantity' => 3,
                'discount' => 13,
            ],
            'Blue shelf' => [],
        ],
        'cartDiscounts' => [5, 16, 15],
    ];
}
// Visose užduotyse stenkitės naudoti array funkcijas

function exercise1(array $array): void
{
    /*
    Išspausdinti visų krepšelio produktų pavadinimus vienoje eilutėje.
    Comfy chair, Yellow lamp, Didzioji sofa, Softest rug, Blue shelf
    */

    $string = '';

    foreach ($array["products"] as $name => $productInfo) {
        $string .= $name . ', ';
    }

    echo chop($string, ', ');
}
exercise1(getShoppingCart());
echo '<hr>';

function exercise2(array $array): float
{
    /*
    Suskaičiuokite pirkimų krepšelio bendrą sumą (price * quantity)
    Kaip matote, krepšelio duomenys, kuriuos gavome iš svetimos sistemos, yra netvarkingi.
    - Skaičiuojant reikėtų atsižvelgti tik į produktus, kurie turi laukus 'price' ir 'quantity'.
    Jeigu produkto laukai užvadinti kitais pavadinimais arba iš viso jų neturi, tą produktą reikia ignoruoti.
    */
    $correctProductArray = [];
    $total = 0;

    foreach ($array['products'] as $product) {
        if(is_array($product)) {
            if($product !== []) {
                $keys = array_keys($product);
                if(in_array('price', $keys) && in_array('quantity', $keys)) {
                    $correctProductArray[] = $product;
                }
            }
        }
    }

    foreach ($correctProductArray as $product) {
        $total += $product['price'] * $product['quantity'];
    }

    return $total;
}
echo exercise2(getShoppingCart());
echo '<hr>';

function exercise3(array $array): float
{

    /*
    Suskaičiuokite pirkinių krepšelio bendrą sumą.
    Galioja tos pačios salygos kaip ir funkcijoje exercise2, bet papildomai reikia:
    - Skaičiuojant bendrą sumą pritaikyti nuolaidas.
    Nuolaida laikoma 'cartDiscounts' masyve, taip pat nuolaida gali būti ir prie produkto - 'discount'.
    Abi reikšmės yra išreikštos procentais.
    Nuolaidos sumuojasi.
    Krepšelio nuolaida taikoma bendrai krepšelio sumai.
    Naudojama tik viena, didžiausia su krepšeliu susieta nuolaida ('cartDiscounts').
    */
    $correctProductArray = [];
    $total = 0;

    foreach ($array['products'] as $product) {
        if(is_array($product)) {
            if($product !== []) {
                if(array_key_exists('price', $product) && array_key_exists('quantity', $product)) {
                    $correctProductArray[] = $product;
                }
            }
        }
    }

    foreach ($correctProductArray as $product) {
        if (array_key_exists('discount', $product)) {
            $total += $product['price'] * $product['quantity'] * (100 - $product['discount']) * 0.01;
        } else {
            $total += $product['price'] * $product['quantity'];
        }
    }

    return round($total * (100 - max($array['cartDiscounts'])) * 0.01, 2);
}
echo exercise3(getShoppingCart());

function exercise4(array $newIpList): array
{
    $existingIpList = [
        '1.17.2.1',
        '15.1.2.1',
        '1.9.2.1',
        '1.1.98.1',
        '1.1.2.12',
        '1.11.2.1',
        '122.1.2.1',
        '1.31.2.1',
        '33.12.2.1',
    ];

    /*
    Sukategorizuokite ip adresų sąrašą.
    ipsNew - ip iš $newIpList, kurių nėra $existingIpList
    ipsOld - ip iš $existingIpList, kurių nėra $newIpList
    ipsRemaining - ip, kurie egzistuoja abiejuose sąrašuose
    funkcija butu kviečiam taip:
    exercise4(
        ['15.1.2.1', '16.1.8.1', '15.1.8.1']
    );
    */
    $result = [
        'ipsNew' => [],
        'ipsOld' => [],
        'ipsRemaining' => [],
    ];

    return $result;
}

function exercise5(): string
{
    $words = [
        'over',
        'jumps',
        'fox',
        'Quick',
        'dog',
        'lazy',
        'very',
        'the',
    ];

    /*
    "Išverskite" masyvą į kitą pusę ir paverskite į string tipo reikšmę.
    Arčiausiai vidurio esantys masyvo elementai turėtų atsirasti šonuose.
    Masyvo elementų skaičius galėtų dideti, bet jis visada bus lyginis.
    Rezultatas turėtų būti - 'Quick fox jumps over the very lazy dog'
    */
    return '';
}


/*
    exercise 6
    Parašykite savo array_map funkcijos versiją nesinaudodami pačia array_map funkcija
*/
function array_map_custom(callable $callback, array $array): array
{
    return [];
}

/*
    exercise 7
    Parašykite savo array_filter funkcijos versiją nesinaudodami pačia array_filter funkcija
*/
function array_filter_custom(array $array, ?callable $callback): array
{
    return [];
}

/*
    exercise 8
    Parašykite savo array_reduce funkcijos versiją nesinaudodami pačia array_reduce funkcija
*/
function array_reduce_custom(array $array, callable $callback, $carry)
{
    return 'array reduced to string';
}