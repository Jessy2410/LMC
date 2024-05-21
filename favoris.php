<?php
require_once 'Connect.php';

// Démarrez la session
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
     header("Location: pageConnexion2.php");
     exit();
}
// Récupérer les produits favoris de l'utilisateur
$user_id = $_SESSION['user_id'];
$sql = "SELECT p.id, p.nom, p.image FROM produits p INNER JOIN favoris f ON p.id = f.id_produit WHERE f.id_utilisateur = $user_id";
$result = $connexion->query($sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("navbar.php")?>
    <title>Favoris</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 120px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
        }
        .favorite-item {
            margin-bottom: 20px;
        }
        .favorite-item img {
            width: 100px; /* Ajustez la taille de l'image selon vos besoins */
            display: block;
            margin: 0 auto;
        }
        .favorite-item a {
            text-decoration: none;
            color: #333;
            display: block;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Favoris</h1>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="favorite-item">
                    <a href="panierTest.php?id=<?php echo $row['id']; ?>">
                        <h3><?php echo $row['nom']; ?></h3>
                        <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['nom']; ?>">
                    </a>
                </div>
                <?php
            }
        } else {
            echo "<p>Aucun favori trouvé.</p>";
        }
        ?>
    </div>
</body>
</html>
