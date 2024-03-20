<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'inscription</title>
    <link rel="stylesheet" href="stylePageInscription.css">
</head>
<body>

<div class="box">
    <form action="" method="post">
        <h2>Inscrivez-vous</h2>

        <div class="inputBox">
            <input type="text" name="nom" required="required" placeholder="Nom :">
            <i></i>
        </div>

        <div class="inputBox">
            <input type="text" name="prenom" required="required" placeholder="Prénom :">
            <i></i>
        </div>

        <div class="inputBox">
            <input type="text" name="mail" required="required" placeholder="Mail :">
            <i></i>
        </div>

        <div class="inputBox">
            <input type="password" name="mdp" required="required" placeholder="Mot de passe :">
            <i></i>
        </div>

        <div class="links">
            <a href="pageConnexion.php">Se connecter</a>
        </div>
        <input type="submit" value="S'inscrire" name="Bouton">
    </form>
</div>  

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Bouton'])) {
    $connexion = mysqli_connect("localhost", "root", "CDadvtam7347!", "lmc");
    if ($connexion === false) {
        die("Erreur : Impossible de se connecter. " . mysqli_connect_error());
    }
    $nom = $_POST['nom'];   
    $prenom = $_POST['prenom'];
    $email = $_POST['mail'];
    $mot_de_passe = $_POST['mdp'];
    $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    $requete = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe) 
                VALUES ('$nom', '$prenom', '$email', '$mot_de_passe_hash')";
    if (mysqli_query($connexion, $requete)) {
        echo "<script>alert('Inscription réussie !');</script>";
    } else {
        echo "<script>alert('Erreur : Impossible de s\\'inscrire. " . mysqli_error($connexion) . "');</script>";
    }
    mysqli_close($connexion);
}
?>
</body>
</html>
