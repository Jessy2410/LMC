<?php
require_once 'Connect.php';

// Démarrez la session
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
     header("Location: page_connexion.php");
     exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['product_id']) && is_numeric($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        $user_id = $_SESSION['user_id'];
        $sql = "INSERT INTO panier (id_utilisateur, id_produit) VALUES ('1', $product_id)";
        if ($connexion->query($sql) === TRUE) {
            ?>
            <script>
                alert("Le produit a été ajouté au panier avec succès.");
                window.location.href = "index.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Le produit est déjà dans votre panier");
                window.location.href = "index.php";
            </script>
            <?php
        }
    }
}
?>
