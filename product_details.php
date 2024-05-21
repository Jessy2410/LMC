<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("navbar.php")?>
    <title>Détails du produit</title>
    <link rel="stylesheet" href="styleDetails.css">
</head>
<body>
    <div class="container">
        <?php
        require_once 'Connect.php';

        $product_id = $_GET['id'];
        $sql = "SELECT * FROM produits WHERE id = $product_id";
        $result = $connexion->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        ?>

        <h1><?php echo $row['nom']; ?></h1>
        <div class="product-info">
            <img width="200" src="<?php echo $row['image']; ?>" alt="<?php echo $row['nom']; ?>">
            <p><strong>Prix:</strong> <?php echo $row['prix']; ?></p>
            <p><strong>Description:</strong> <?php echo $row['description']; ?></p>
            <form action="ajouter_fav.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                <button class="btnP" type="submit"><ion-icon class="iconeH" name="heart"></ion-icon>Ajouter aux favoris</button>
            </form>
            <form action="ajouter_panier.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                <button class="btnP" type="submit"><ion-icon class="iconeP" name="cart"></ion-icon>Ajouter au panier</button>
            </form>
        </div>

        <?php
        } else {
            echo "Aucun produit trouvé";
        }
        ?>
    </div>

    <script>
        function addToFavorites() {

            alert("Produit ajouté aux favoris !");
        }
        
    </script>
</body>
</html>
