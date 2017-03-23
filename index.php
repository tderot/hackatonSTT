<?php
include 'header.php';
?>


    <form action="request.php" method="POST">
        <input type="text" class="form-control" placeholder="produit" name="produit">
        <input type="submit" name="Ok" value="Find this produit !">
    </form>
<?php
include 'footer.php';
?>