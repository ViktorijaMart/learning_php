<?php

// PHP > 7 empty array

$contacts = [];

// PHP < 7 empty array

$contactsArray = array();

// add new element to an array

$newArray['keyOfNewElement'] = 'new element';

$products = [];

$products['phones'][] = 'iphone';
$products['phones'][] = 'Xiaomi';
$products['tv'][] = 'Blabla';

$key = array_search('Xiaomi', $products['phones']);

echo $key;

