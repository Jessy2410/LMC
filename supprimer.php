<?php
include 'connect.php';

if(isset($_GET['id'])) {
    $article_id = mysqli_real_escape_string($connexion, $_GET['id']);

    $query = "DELETE FROM produits WHERE id = $article_id";
    echo "L'article a bien été supprimé.";

    if(mysqli_query($connexion, $query)) {
        header("Location: ListeArticleAdmin.php");
        exit();
    } else {
        echo "Erreur lors de la suppression de l'article: " . mysqli_error($connexion);
    }
} else {
    echo "ID de l'article non fourni.";
}

mysqli_close($connexion);
?>

