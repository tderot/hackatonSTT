<?php

include 'header.php';
include 'connect.php';
$bdd = mysqli_connect (SERVER,USER,PASS,DB);

$product = $_GET['product'];

$productArray = explode(',', $product);

?>

    <table class="table table-bordered">
    <thead>
    <th>nom</th>
    <th>kcal</th>
    <th>note</th>
    <th>image</th>
    </thead>
    <tbody>
    <tr>

        <td><?php echo $productArray[0]?></td>


        <td><?php echo $productArray[1]?></td>

        <td><?php echo $productArray[2]?></td>

        <td><img src="<?php echo $productArray[3]?>" alt="boire ou manger"></td>
        </tr>
    </tbody>
    </table>


    <form method="POST">
        <div class="form-group">
            <label for="sport">Choisissez un sport</label>
            <select class="form-control" id="sport" name="sport">
                <?php

                $sport = mysqli_query($bdd, "SELECT * FROM sports");
                while ($data=mysqli_fetch_assoc($sport)) {
                    $truc = $data['sport'];
                    echo '<option value="'.$data['id'].'">'.$truc.'</option>';
                }
                ?>

            </select>
        </div>

        <input type="submit" name="Ok" value="Calcul">
    </form>



<?php
$calprod = $productArray[1];
$calcul = $truc;


if (isset($_POST['sport'])){
    $res = mysqli_query($bdd, "SELECT kcal FROM sports where id=".$_POST['sport']);

    while ($data=mysqli_fetch_assoc($res)) {
        $calorie = $data['kcal'];
        echo 'il faut se bouger le cul pendant '.round($calprod/$calorie).' heures Gros sac!!';
    }
}








include 'footer.php';
?>

