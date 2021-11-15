<?php

    require('connect.php');

    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    $query = "SELECT * FROM products WHERE ProductId = :id LIMIT 1";

    $statement = $db->prepare($query);
    $statement->bindValue('id', $id, PDO::PARAM_INT);
    $statement->execute();

    $row = $statement->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
        <div class="container-fluid">
            <a href="index.php" id="homeLink">UL Gear Hub</a>
            <form method="post">
                <input type="text" placeholder="Search for gear">
                <button>Search</button>
            </form>
            <a href="categories.php" id="categoriesLink">Categories</a>
            <a href="contact.php" id="contactLink">Contact</a>
            <a href="login.php" id="logInLink">Log in / Sign up</a>
        </div>
    </nav>

    <div id="all_products">
            
        <div id="single_product">
            <h2><?= $products['Manufacturer'] ?> - <?= $products['ProductName'] ?></h2>

            <?php $timestamp = strtotime($products['DateAdded']) ?>
            <small><?= date('F j, Y, g:i a', $timestamp) . " - "?></small>

            <p><?= $products['Description'] ?></p>

            <h4>Pros:</h4>
            <p><?= $products['Pros']?></p>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>