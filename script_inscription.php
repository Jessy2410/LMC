<?php
require_once 'Connect.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['password'])) {
    $nom = $_POST['nom'];   
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['password'];
    $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    
    // Vérifier si l'email OU le nom et prénom n'existent pas déjà dans la base de données
    $requete_verif_email = "SELECT * FROM utilisateurs WHERE email='$email'";
    $requete_verif_nom_prenom = "SELECT * FROM utilisateurs WHERE nom='$nom' AND prenom='$prenom'";
    $resultat_verif_coordonnées = mysqli_query($connexion, $requete_verif_email, $requete_verif_nom_prenom);
    
    if (mysqli_num_rows($resultat_verif_email) == 0) {
        // Insérer l'utilisateur dans la base de données
        $requete_insertion = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe) 
                            VALUES ('$nom', '$prenom', '$email', '$mot_de_passe_hash')";
        if (mysqli_query($connexion, $requete_insertion)) {
            echo "<script>alert('Inscription réussie !');</script>";
        } else {
            echo "<script>alert('Erreur : Impossible de s\\'inscrire. " . mysqli_error($connexion) . "');</script>";
        }
    } else {
        echo "<script>alert('L\'email ou le nom et prénom existent déjà dans la base de données.');</script>";
    }
}
?>


<?php
// Redirection vers une autre page après un délai de 5 secondes
sleep(1);
header("Location: index.php");
exit();
?>
</body>
</html>
