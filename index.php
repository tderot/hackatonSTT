<?php
include 'header.php';
?>

<header>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 banner">
                    <img src="image/medecin.jpg">
                </div>
            </div>
        </div>

          <div class="row">
            <div class="col-md-offset-4 col-md-3 search">
                <form action="request.php" method="POST">
                    <label for="click">Merci de renseigner le fautif de vos prochaines douleurs!</label>
                    <input type="text" class="form-control" placeholder="produit" name="produit" id="click">
                    <input type="submit" id="Ok" value="Alors? C'est gras?">
                </form>
            </div>
        </div>
    </header>
    <img class="logoopen" src="image/openfoodfactslogo.png">
    <img class="logowcs" src="image/logo_small_orange_horizontal.png">

<?php
include 'footer.php';
?>
