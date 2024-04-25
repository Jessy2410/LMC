<?php
require_once 'Connect.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['password'])) {
    $nom = $_POST['nom'];   
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mot_de_passe = $_POST['password'];
    $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
    
    // Vérifier si l'email n'existe pas déjà dans la base de données
    $requete_verif_email = "SELECT * FROM utilisateurs WHERE email='$email'";
    $resultat_verif_email = mysqli_query($connexion, $requete_verif_email);
    
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
        echo "<script>alert('L\'email existe déjà dans la base de données.');</script>";
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
