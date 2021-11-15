<?php
    require('connect.php');

    $query = "SELECT * FROM products";
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
        <?php if (count($products) > 0):

            foreach(array_reverse($products) as $products): ?>
                <div id="single_product">
                    <h2><a href="show.php?id=<?= $products['ProductId'] ?>" ><?= $products['Manufacturer'] ?> - <?= $products['ProductName'] ?></a></h2>

                    <?php $timestamp = strtotime($products['DateAdded']) ?>
                    <small><?= date('F j, Y, g:i a', $timestamp) . " - "?></small>

                    <p><?= $products['Description'] ?></p>

                    <h4>Pros:</h4>
                    <p><?= $products['Pros']?></p>
                </div>
                
            <?php endforeach ?>        
        <?php else : ?>        
            <tr>
                <td>No posts found.</td>
            </tr>

        <?php endif ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>