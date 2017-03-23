<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OFF</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>


<body>
<form action="request.php" method="post">
<div class="btn-group">
    <button type="button" class="btn btn-danger">Selectionne avec tes gros doigts</button>
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <ul class="dropdown-menu" name="produit">
        <li><a href="request.php">pizzas</a></li>
        <li><a href="request.php">sodas</a></li>
    </ul>
</div>
</form>



<!--    <form action="request.php" method="POST">-->
<!--        <input type="text" class="form-control" placeholder="produit" name="produit">-->
<!--        <input type="submit" name="Ok" value="Find this produit !">-->
<!--    </form>-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>