<?php
//Default parameters by case



//Format url

$url = 'https://fr-en.openfoodfacts.org/category/{product}.json';

// Where we will set the value of the scan

$produit = $_POST['produit'];

$url = str_replace(['{product}'],[$produit],$url);

// Connection to the API (french version here)

$result = file_get_contents($url);

// Decoding the JSON into an usable array (the value "true" confirms that the return is only an array)

$json = json_decode($result, true);

// Get the datas we want

$productName = $json[$produit]['product_name'];

$brand = $json[$produit]['brands'];

$image = $json[$produit]['image_small_url'];

$viewData = file_get_contents('response.html');

echo str_replace(
    ['{productName}','{brand}','{image}','{json}'],
    [$productName,$brand,$image,print_r($json,true)],
    $viewData);