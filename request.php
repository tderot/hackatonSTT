<?php
$url = 'https://fr.openfoodfacts.org/category/{product}.json';


$produit = $_POST['produit'];

$url = str_replace(['{product}'],[$produit],$url);

$result = file_get_contents($url);

$json = json_decode($result, true);

?>
<table>
    <thead>
        <th>nom</th>
        <th>kcal</th>
        <th>note</th>
        <th>image</th>
    </thead>
    <tbody>
<?php
for ($i=0; $i<20; $i++)
{

    $image=$json['products'][$i]['image_url'];

    echo '<tr>';

    echo '<td>' . $json['products'][$i]['product_name'] . '</td>';

    echo '<td>' . $json['products'][$i]['nutriments']['energy_value'] . '</td>';

    echo '<td>' . $json['products'][$i]['nutrition_grades'] . '</td>';

    echo '<td>' . '<img src="'.$image.'" alt="boire"></td>';

    echo '</tr>';
}
?>
    </tbody>
</table>