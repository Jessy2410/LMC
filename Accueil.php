<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PC Gamer Shop</title>
    <link rel="stylesheet" href="styleAccueil.css">
</head>
<body>
<header class="header">
        <h1>PC Gamer Shop</h1>
        <nav class="navb">
            <ul class="ul">
                <li class="li"><h3>Bienvenue sur LMC</h3></li>
            </ul>
        </nav>
    </header>

    <section class="popular-products">
        <h2>Produits les plus consultés</h2>
        <div class="carousel">
            <?php
            // Connexion à la base de données
            $connexion = mysqli_connect("localhost", "root", "CDadvtam7347!", "LMC");

            // Vérification de la connexion
            if (!$connexion) {
                die("La connexion à la base de données a échoué : " . mysqli_connect_error());
            }

            // Requête pour récupérer les trois premiers produits
            $requete = "SELECT * FROM produits LIMIT 3";
            $resultat = mysqli_query($connexion, $requete);

            // Vérification de la requête
            if (!$resultat) {
                die("La requête a échoué : " . mysqli_error($connexion));
            }

            // Affichage des produits dans le carrousel
            while ($row = mysqli_fetch_assoc($resultat)) {
                echo '<div class="product">';
                echo '<img width="150px" height="150px" src="' . $row['image'] . '" alt="' . $row['nom'] . '">';
                echo '<h3>' . $row['nom'] . '</h3>';
                echo '<p>' . $row['description'] . '</p>';
                echo '<span class="price">' . $row['prix'] . ' €</span>';
                echo '<button class="btn2">Acheter</button>';
                echo '</div>';
            }

            // Fermeture de la connexion
            mysqli_close($connexion);
            ?>
        </div>
    </section>

    <?php include("footer.php") ?>
</body>
</html>
