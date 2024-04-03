<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("navbar.php")?>
    <title>Détails du produit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
        }
        .product-info {
            margin-top: 20px;
        }
        .product-info p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            $mysqli = new mysqli("localhost", "root", "CDadvtam7347!", "LMC");
            if ($mysqli->connect_error) {
                die("Erreur de connexion à la base de données: " . $mysqli->connect_error);
            }

            $product_id = $_GET['id'];
            $sql = "SELECT * FROM produits WHERE id = $product_id";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>

        <h1><?php echo $row['nom']; ?></h1>
        <div class="product-info">
            <img width="200" src="<?php echo $row['image']; ?>" alt="<?php echo $row['nom']; ?>">
            <p><strong>Prix:</strong> <?php echo $row['prix']; ?></p>
            <p><strong>Description:</strong> <?php echo $row['description']; ?></p>
        </div>

        <?php
            } else {
                echo "Aucun produit trouvé";
            }
            $mysqli->close();
        ?>
    </div>
</body>
</html>
