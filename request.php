<?php


$url = 'https://ssl-api.openfoodfacts.org/category/{product}.json';


$produit = $_POST['produit'];

$url = str_replace(['{product}'],[$produit],$url);

$result = file_get_contents($url);

$json = json_decode($result, true);


for ($i=0; $i<25;$i++) {

    $img=$json ['products'][$i]['image_url'];
    var_dump($json ['products'][$i]['product_name']);
    var_dump($json ['products'][$i]['image_url']);
    echo '<img src="'.$img.'"alt= "buvez">';
}
