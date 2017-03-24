<?php
include 'header.php';
?>

<header>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 banner">
                <img src="http://lionheartstl.com/wp-content/uploads/2013/03/banner1.png">
            </div>
        </div>
        <div class="title">
            <h1>Bienvenu sur le simulateur de désespoir!!!</h1><br>
            <h2>Ici on vous propose de connaitre le prix en sport de votre pecher mignon ....</h2>
        </div>
        <div class="row">
            <div class="col-md-offset-2 col-md-6 search">
                <form action="request.php" method="POST">
                    <input type="text" class="form-control" placeholder="produit" name="produit">
                    <input type="submit" name="Ok" value="Find this produit !">
                </form>
            </div>
        </div>
    </div>
</header>

<?php
include 'footer.php';
?>
