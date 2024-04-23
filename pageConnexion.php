<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="stylePageConnexion.css">
</head>
<body>

<div class="box">
    <span class="borderLine"></span>
    <form method="post" action="">
        <h2>Connectez-vous</h2>
        <div class="inputBox">
            <input type="text" name="mail" required="required" placeholder="Mail :">
            <i></i>
        </div>
        <div class="inputBox">
            <input type="password" name="mdp" required="required" placeholder="Mot de passe :">
            <i></i>
        </div>
        <div class="links">
            <a href="#">Mot de passe oublié ?</a>
            <a href="pageInscription.php">S'inscrire ?</a>
        </div>
        <input type="submit" value="Connexion" name="btnConnexion">
    </form>
</div>

<?php
// Démarrez la session
session_start();

require_once 'Connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['btnConnexion'])) {
    $email = $_POST['mail'];
    $mot_de_passe = $_POST['mdp'];
    
    $requete = "SELECT * FROM utilisateurs WHERE email='$email'";
    $resultat = mysqli_query($connexion, $requete);
    
    if (!$resultat) {
        die("Erreur d'exécution de la requête : " . mysqli_error($connexion));
    }
    
    if (mysqli_num_rows($resultat) == 1) {
        $row = mysqli_fetch_assoc($resultat);
        if (password_verify($mot_de_passe, $row['mot_de_passe'])) {
            // Stocker les informations de l'utilisateur dans la session
            $_SESSION['user_id'] = $row['id']; // Changez 'id' avec la colonne appropriée de votre table utilisateurs
            echo "<script>alert('Connexion réussie !');</script>";
             header("Location: index.php");
             exit();
        } else {
            echo "<script>alert('Mot de passe incorrect');</script>";
        }
    } else {
        echo "<script>alert('Aucun compte associé à cet e-mail');</script>";
    }
}
?>
</body>
</html>
