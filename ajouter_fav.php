<?php
require_once 'Connect.php';

// Démarrez la session
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
     header("Location: pageConnexion2.php");
     exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['product_id']) && is_numeric($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        $user_id = $_SESSION['user_id'];

        // Utiliser l'ID de l'utilisateur connecté dans la requête SQL
        $sql = "INSERT INTO favoris (id_utilisateur, id_produit) VALUES ('$user_id', $product_id)";
        
        if ($connexion->query($sql) === TRUE) {
            ?>
            <script>
                alert("Le produit a été ajouté aux favoris avec succès.");
                window.location.href = "index.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Le produit est déjà un de vos coups de coeur");
                window.location.href = "index.php";
            </script>
            <?php
        }
    }
}
?>
