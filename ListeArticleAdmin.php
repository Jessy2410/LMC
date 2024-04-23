<?php
include 'connect.php'; // Include the file to connect to the database
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Liste des Articles</title>
<link rel="stylesheet" href="styleL.css">
</head>
<body>

<?php
    include("navbar.html");
?>

<div class="Listeprincipale">
    <a href="AjoutArticle.php"><button class="btnA">Ajouter</button></a> <!-- Ajouter button -->
    <div class="article-list">
        
        <?php
        // Requête pour récupérer les produits
        $query = "SELECT * FROM produits";
        $result = mysqli_query($connexion, $query);

        // Vérifier si la requête a réussi
        if (!$result) {
            die("Erreur de requête SQL: " . mysqli_error($connexion));
        }

        // Afficher la liste des produits
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="article">';
            echo '<img src="' . $row['image'] . '" alt="' . $row['nom'] . '">';
            echo '<div class="article-details">';
            echo '<div class="article-title">' . $row['nom'] . '</div>';
            echo '<div class="article-description">' . $row['description'] . '</div>';
            echo '<div class="article-price">Prix : ' . $row['prix'] . '€</div>';
            echo '</div>';
            echo '<div class="article-actions">';
            echo '<a href="modifier.php"><button class="btnB">Modifier</button></a>';   
            echo '<a href="supprimer.php?id=' . $row['id'] . '"><button class="btnB">Supprimer</button></a>';
            echo '</div>';
            echo '</div>';
        }
        // Libérer le résultat
        mysqli_free_result($result);

        // Fermer la connexion
        mysqli_close($connexion);
        ?>
    </div>
</div>

</body>
</html>
