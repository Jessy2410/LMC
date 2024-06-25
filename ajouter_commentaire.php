<?php
require_once 'Connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $commentaire = $_POST['commentaire'];
    $user_name = 'User'; // Remplacez cela par le nom de l'utilisateur connecté

    $sql = "INSERT INTO commentaires (product_id, user_name, commentaire, created_at) VALUES (?, ?, ?, NOW())";
    $stmt = $connexion->prepare($sql);
    $stmt->bind_param('iss', $product_id, $user_name, $commentaire);
    
    if ($stmt->execute()) {
        header("Location: panierTest.php?id=$product_id");
    } else {
        echo "Erreur : " . $stmt->error;
    }
}
?>