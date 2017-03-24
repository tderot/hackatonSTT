<?php
include 'header.php';
?>

<header>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 banner">
                    <img src="image/medecine.png">
                </div>
            </div>
        </div>

          <div class="row">
            <div class="col-md-offset-4 col-md-3 search">
                <form action="request.php" method="POST">
                    <input type="text" class="form-control" placeholder="produit" name="produit">
                    <input type="submit" name="Ok" value="Find this product !">
                </form>
            </div>
        </div>
    </header>

<?php
include 'footer.php';
?>
