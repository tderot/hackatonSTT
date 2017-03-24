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
        if (isset($json['products'][$i]['product_name']) && isset($json['products'][$i]['nutriments']['energy_value']) && isset($json['products'][$i]['nutrition_grade_fr']) && isset($json['products'][$i]['image_url'])) {

            $image = $json['products'][$i]['image_url'];

            $name = $json['products'][$i]['product_name'];

            $kcal = round($json['products'][$i]['nutriments']['energy_value']/4.18);

            $note = $json['products'][$i]['nutrition_grade_fr'];
            switch ($note) {
                case 'a':
                    $note = '<img class="nutriscore" src="image/nutriscore-a.png">';
                    break;
                case 'b':
                    $note = '<img class="nutriscore" src="image/nutriscore-b.png">';
                    break;
                case 'c':
                    $note = '<img class="nutriscore" src="image/nutriscore-c.png">';
                    break;
                case 'd':
                    $note = '<img class="nutriscore" src="image/nutriscore-d.png">';
                    break;
                case 'e':
                    $note = '<img class="nutriscore" src="image/nutriscore-e.png">';
                    break;
            }

            $test = array('name'=>$json['products'][$i]['product_name'],
                            'kcal'=>$kcal,
                            'note'=>$json['products'][$i]['nutrition_grade_fr'],
                            'image'=>$image);

            $test1 = implode($test,',');
            //var_dump($test1);
            echo '<tr>';

            echo '<td>' . $name . '</td>';


            echo '<td>' . $kcal . '</td>';

            echo '<td>' . $note . '</td>';

            echo '<td>' . '<img class="imgProduct" src="' . $image . '" alt="boire ou manger"></td>';


            echo '<td>
                      <a href="sport.php?product='.$test1.'" class="btn btn-success" role="button">c\'est à cause de lui</a>
                    </td>';

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




