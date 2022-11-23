<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$testArray = [
    'Hello,',
    'my',
    'name',
    'is',
    'Victoria'
];

echo '<pre>';
print_r($testArray);
echo '<hr>';

//////////////////////////////////////////////////////////////////
//  IMPLODE
echo implode(' ', $testArray);
echo '<br>';

function myImplode(string $separator, array $myArray): string
{
    $myString = '';
    $elementsCount = count($myArray);

    foreach ($myArray as $index => $element) {
        $myString .= $element;

        if ($index < $elementsCount - 1) {
            $myString .= $separator;
        }
    }
    return $myString;
}

echo myImplode(' ', $testArray);
echo '<hr>';

//////////////////////////////////////////////////////////////////
// COUNT
echo count($testArray);
echo '<br>';

function myCount(array $array): int
{
    $accumulator = 0;

    foreach ($array as $element)
    {
        $accumulator++;
    }
    return $accumulator;
}

echo myCount($testArray);
echo '<hr>';

/////////////////////////////////////////////////////////////////
/// IS ARRAY
if (is_array($testArray)) {
    if (isset($testArray['statusCode'])) {
        echo $testArray['statusCode'];
    } else {
        echo 'Status Code not found';
    }
} else {
    echo 'Null returned';
}
echo '<hr>';

/////////////////////////////////////////////////////////////////
/// ARRAY VALUES (KEYS TO INDEXES) - DOESN'T CHANGE ORIGINAL ARRAY
$products = [
    'iphone' => '11 pro',
    'samsung' => 'galaxy 22'
];

echo '<pre>';
print_r($products);

print_r(array_values($products));

print_r($products);

function arrayValues(array $array): array
{
    $indexedArray = [];

    foreach ($array as $element) {
        $indexedArray[] = $element;
    }

    return $indexedArray;
}

print_r(arrayValues($products));
echo '<hr>';

///////////////////////////////////////////////////////////////////
/// ARRAY KEYS - DOESN'T CHANGE ORIGINAL ARRAY
$products2 = [
    'phones' => ['iphone13'],
    'tv' => ['samsung', 'LG'],
    'headphones' => []
];

$productsCategories = array_keys($products2);

print_r($productsCategories);

function getActiveCategories(array $array): array
{
    $activeCategories = [];
    foreach ($array as $categoryName => $categoryItems) {
        if(count($categoryItems) > 0) {
            $activeCategories[] = $categoryName;
        }
    }

    return $activeCategories;
}

print_r(getActiveCategories($products2));
echo '<hr>';

///////////////////////////////////////////////////////////////////
/// ARRAY UNIQUE - DOESN'T CHANGE ORIGINAL ARRAY
$products3 = [
    'iphone13',
    'lg',
    'samsung',
    'lg',
    'iphone13'
];

print_r($products3);

$uniqueProducts = array_unique($products3);
print_r($uniqueProducts);

function getUniqueValues(array $array): array
{
    $uniqueValues = [];

    foreach ($array as $element) {
        if (!in_array($element, $uniqueValues)) {
            $uniqueValues[] = $element;
        }
    }
    return $uniqueValues;
}

print_r(getUniqueValues($products3));
echo '<hr>';

/////////////////////////////////////////////////////////////////
$string = 'labas, as esu php devas';

function upperCaseFirstLetter(string $string): void
{
    $array = explode(' ', $string);
    $upperCaseArray = [];

    foreach ($array as $element) {
        $upperCaseArray[] = ucfirst($element);
    }

    echo implode(' ', $upperCaseArray);
}

upperCaseFirstLetter($string);
echo '<hr>';

///////////////////////////////////////////////////////////////////
/// ARRAY MAP
$mapProducts = [
    [
        'type' => 'office',
        'name' => 'desc'
    ],
    [
        'type' => 'kitchen',
        'name' => 'dinning table'
    ]
];

print_r($mapProducts);

$modifiedProductList = array_map(
  function (array $product) {
      $product['count'] = 0;

      return $product;
  },
  $mapProducts
);

print_r($modifiedProductList);

function myArrayMap(array $array): array
{
   foreach ($array as $key => $element) {
       $array[$key]['count'] = 0;
   }

   return $array;
}

print_r(myArrayMap($mapProducts));
echo '<hr>';

//////////////////////////////////////////////////////////////////
/// RESET
print_r(reset($mapProducts));
echo '<hr>';

//////////////////////////////////////////////////////////////////
/// ARRAY COLUMN
print_r(array_column($mapProducts, 'name'));
echo '<hr>';

//////////////////////////////////////////////////////////////////
/// ARRAY FILTER
