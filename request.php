<?php

include 'header.php';

?>

<h1>C'est qui qui a mangé des trucs trop gras et qui culpabilise?</h1>

<table class="table table-bordered sortable">
    <thead>
    <th>nom</th>
    <th>kcal</th>
    <th>note</th>
    <th>image</th>
    <th>celui-ci</th>
    </thead>
    <tbody>
<?php

for ($j=1; $j<5; $j++){
$url = 'https://fr.openfoodfacts.org/category/{product}/' . $j . '.json';


$produit = $_POST['produit'];

$url = str_replace(['{product}'], [$produit], $url);

$result = file_get_contents($url);

$json = json_decode($result, true);

    for ($i = 0; $i < 100; $i++) {
        if (isset($json['products'][$i]['product_name']) && isset($json['products'][$i]['nutriments']['energy_value']) && isset($json['products'][$i]['nutrition_grades']) && isset($json['products'][$i]['image_url'])) {

            $image = $json['products'][$i]['image_url'];

            echo '<tr>';

            echo '<td>' . $json['products'][$i]['product_name'] . '</td>';

            echo '<td>' . $json['products'][$i]['nutriments']['energy_value'] . '</td>';

            echo '<td>' . $json['products'][$i]['nutrition_grades'] . '</td>';

            echo '<td>' . '<img src="' . $image . '" alt="boire ou manger"></td>';

            echo '<td><form action="sport.php" method="get">
                      <button type="submit" class="btn btn-success" name="produitname">c\'est à cause de lui</button>
                    </form></td>';

            echo '</tr>';
        }
    }
    }
?>
    </tbody>
</table>

<?php
include 'footer.php';
?>




