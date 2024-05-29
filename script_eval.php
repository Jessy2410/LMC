<?php
session_start(); 
require_once 'Connect.php';

if (!isset($_SESSION['user_id'])) {
    echo "Vous devez être connecté pour noter un produit.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_produit = $_POST['id_produit'];
    $note = $_POST['note'];
    $id_utilisateur = $_SESSION['user_id'];

    $stmt = $connexion->prepare("INSERT INTO evaluations (id_produit, id_utilisateur, note) VALUES ($id_produit, $id_utilisateur, $note)");

    if ($stmt->execute()) {
        echo "Évaluation enregistrée avec succès.";
    } else {
        echo "Erreur lors de l'enregistrement de l'évaluation : " . $stmt->error;
    }

    $connexion->close();

    header("Location: panierTest.php?id=$id_produit");
    exit();
}
?>
