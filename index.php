<?php
require_once 'Connect.php';

// Démarrez la session
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
     header("Location: pageConnexion2.php");
     exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMC</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="stylePageArticles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/3010b1eaf1.js" crossorigin="anonymous"></script>
</head>
<body>

<!-- Partie Navbar -->
<?php include("navbar.php")?>

<!-- Patie Articles -->
<section id="article">
    <h1 class="section_title">Nos Articles</h1>
    <div class="gallery">
        <?php
        // Requête pour récupérer les produits
        $result = $connexion->query("SELECT * FROM produits");

        // Affichage des produits
        while ($row = $result->fetch_assoc()) {
            echo '<div class="content">';
            echo '<img src="' . $row['image'] . '" alt="' . $row['nom'] . '">';
            echo '<h3>' . $row['nom'] . '</h3>';
            echo '<p>' . $row['description'] . '</p>';
            echo '<h6>' . $row['prix'] . '€</h6>';
            echo '<ul class="ul">';
            // Ajout de 5 étoiles
            for ($i = 0; $i < 5; $i++) {
                echo '<li><i class="fa fa-star checked"></i></li>';
            }
            echo '</ul>';
            // Formulaire pour soumettre l'ID du produit
            echo "<form action='product_details.php' method='GET'>";
            echo "<input type='hidden' name='id' value='{$row['id']}'>";
            echo "<button type='submit' class='buy-1'>Acheter maintenant</button>";
            echo "</form>";
            echo '</div>';
        }

        // Fermeture de la connexion
        $connexion->close();
        ?>
    </div>
</section> 

<script>

    var menu_toggle = document.querySelector('.menu_toggle');
    var menu = document.querySelector('.menu');
    var menu_toggle_span = document.querySelector('.menu_toggle span');

    menu_toggle.onclick = function(){
        menu_toggle.classList.toggle('active');
        menu_toggle_span.classList.toggle('active');
        menu.classList.toggle('responsive') ;
    }

</script>

<?php include("footer.php")?>

</body>
</html>
