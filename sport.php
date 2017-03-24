<?php

include 'header.php';
include 'connect.php';
$bdd = mysqli_connect (SERVER,USER,PASS,DB);

$product = $_GET['product'];

$productArray = explode(',', $product);
switch ($productArray[2]) {
    case 'a':
        $productArray[2] = '<img class="nutriscore" src="image/nutriscore-a.png">';
        break;
    case 'b':
        $productArray[2] = '<img class="nutriscore" src="image/nutriscore-b.png">';
        break;
    case 'c':
        $productArray[2] = '<img class="nutriscore" src="image/nutriscore-c.png">';
        break;
    case 'd':
        $productArray[2] = '<img class="nutriscore" src="image/nutriscore-d.png">';
        break;
    case 'e':
        $productArray[2] = '<img class="nutriscore" src="image/nutriscore-e.png">';
        break;
}
?>
<div class="container-fluid sportif">
    <div class="row">
        <div class="col-md-2">

        <img class="imgProduct" src="<?php echo $productArray[3]?>" alt="boire ou manger">

        </div>
    </div>
    <div class="row">
        <div class="col-md-offset-2 col-md-8">

            <table class="table table-bordered sport">
            <thead>
            <th>nom</th>
            <th>kcal</th>
            <th>note</th>
            </thead>
            <tbody>
            <tr>

                <td><?php echo $productArray[0]?></td>

                <td><?php echo $productArray[1]?></td>

                <td><?php echo $productArray[2]?></td>

                </tr>
            </tbody>
            </table>
        </div>
    </div>
</div>


    <form method="POST">

        <div class="form-group">
            <label for="sport">Choisissez un sport</label>
            <select style="width: 20%" class="form-control" id="sport" name="sport">
                <?php

                $sport = mysqli_query($bdd, "SELECT * FROM sports");
                while ($data=mysqli_fetch_assoc($sport)) {
                    $truc = $data['sport'];
                    echo '<option value="'.$data['id'].'">'.$truc.'</option>';
                }
                ?>

            </select>
        </div>
        <input type="submit" value="Calcul" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"/>

    </form>



<?php

$calprod = $productArray[1];
$calcul = $truc;

if (isset($_POST['sport'])){
    $res = mysqli_query($bdd, "SELECT kcal FROM sports where id=".$_POST['sport']);

    while ($data=mysqli_fetch_assoc($res)) {
        $calorie = $data['kcal'];
        $heure=floor($calprod/$calorie);
        $minute= ((($calprod/$calorie)-$heure)*60);
//        echo 'il faut se bouger le cul pendant '.$heure.' heures et '.round($minute).' minutes!!';
        $minute=((($calprod/$calorie)-$heure)*60);

    }


}



?>

<!-- Modal -->
<div class="modal fade"  tabindex="-1" role="dialog" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body"><?php

                echo 'il faut se bouger le cul pendant '.$heure.' heures et '.round($minute).' minutes!!';

                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
            </div>
        </div>
    </div>
</div>


<?php

include 'footer.php';
?>
