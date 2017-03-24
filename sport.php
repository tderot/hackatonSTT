<?php

include 'header.php';
include 'connect.php';
$bdd = mysqli_connect(SERVER, USER, PASS, DB);

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
        <div class="row prod">
            <div class="col-md-2">
                <img class="imgProduct" src="<?php echo $productArray[3] ?>" alt="boire ou manger">
            </div>
            <div class="col-md-2 texteSport">
                <?php echo $productArray[2] ?>
            </div>
            <div class="col-md-2 texteSport">
                <?php echo $productArray[0] ?>
            </div>
            <div class="col-md-2 texteSport">
                <?php echo $productArray[1] ?> Kcal
            </div>

        </div>

        <div class="row">
            <div class="col-md-2">
                <a href="index.php"><img src="image/fleche.png" alt="retour acceuil"></a>
            </div>

            <div class="col-md-offset-2 col-md-8">

                <form method="POST">

                    <div class="form-group choix">
                        <label for="sport">Choisissez un sport pour <br/>perdre toutes ces calories!</label>
                        <select style="width: 20%" class="form-control" id="sport" name="sport">
                            <?php

                            $sport = mysqli_query($bdd, "SELECT * FROM sports");
                            while ($data = mysqli_fetch_assoc($sport)) {
                                $truc = $data['sport'];
                                echo '<option value="' . $data['id'] . '">' . $truc . '</option>';
                            }
                            ?>

                        </select>
                    </div>
                    <input type="submit" value="Bonne ambiance" class="btn btn-primary btn-lg" data-toggle="modal"
                           data-target="#myModal"/>

                </form>
            </div>
        </div>
    </div>
<?php

$calprod = $productArray[1];
$calcul = $truc;

if (isset($_POST['sport'])) {
    $res = mysqli_query($bdd, "SELECT * FROM sports where id=" . $_POST['sport']);

    while ($data = mysqli_fetch_assoc($res)) {
        $calorie = $data['kcal'];
        $acti = $data['sport'];
        $heure = floor($calprod / $calorie);
        $minute = ((($calprod / $calorie) - $heure) * 60);
        $minute = ((($calprod / $calorie) - $heure) * 60);

    }

}

?>

    <!-- Modal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                    <?php
                    if ($heure < 1) {
                        echo '<img src="https://media.tenor.co/images/b50f78b7ccc3693c39a2ca2a10d83b7a/tenor.gif"class="coco" >';

                    } else {
                        echo '<img  src="http://www.biblond.com/wp-content/uploads/2016/03/bloggif_56e837c2c175f.gif"class="coco">';
                    }
                    ?>
                </div>
                <div class="modal-body">
                    <?php

                    echo 'Mais vous savez moi je ne crois pas qu’il y ait de bonne ou de mauvaise situation… Moi si je devais 
                résumer ma vie aujourd’hui, avec vous, je dirai que c’est d’abord des rencontres, des gens qui m’ont tendu 
                la main, peut-être à un moment où je ne pouvais pas, où j’étais seul chez moi. Et c’est assez curieux de se 
                dire que les hasards, les rencontres forgent une destinée parce que quand on a le goût de la chose, quand on 
                a le goût de la chose bien faite, le beau geste, parfois on ne trouve pas l’interlocuteur en face, je dirais, 
                le miroir qui vous aide à avancer.
Alors ça n’est pas mon cas comme je le disais là puisque moi au contraire j’ai pu et je dis merci à la vie, je lui dis merci 
et je chante la vie, je danse la vie, je ne suis qu’Amour!
Et finalement quand beaucoup de gens aujourd’hui me disent : “Mais comment fais tu pour avoir cette humanité?” et bien je leur 
répond très simplement, je leur dis que c’est ce goût de l’Amour, ce goût donc qui m’a poussé aujourd’hui à entreprendre une 
construction mécanique mais demain qui sait, peut-être simplement à me mettre au service de la communauté, à faire le don, 
le don de soi. <br/>
Donc pour résumer je pense que vous devriez faire :<br/><strong> ' . $heure . ' heures et ' . round($minute) . ' minutes de ' . $acti . '</strong>';

                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php

include 'footer.php';
?>