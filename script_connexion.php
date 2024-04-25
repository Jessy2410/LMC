<?php
// Démarrer la session
session_start();

// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    // Inclure le fichier de connexion à la base de données
    require_once 'Connect.php';

    // Récupérer les données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Requête SQL pour vérifier les informations de connexion
    $query = "SELECT id, email, mot_de_passe FROM utilisateurs WHERE email = ?";
    
    // Préparer la requête
    $stmt = $connexion->prepare($query);

    // Lier les paramètres
    $stmt->bind_param("s", $email);

    // Exécuter la requête
    $stmt->execute();

    // Récupérer le résultat de la requête
    $result = $stmt->get_result();

    // Vérifier si un utilisateur avec cet e-mail existe
    if ($result->num_rows === 1) {
        // Récupérer les données de l'utilisateur
        $user = $result->fetch_assoc();

        // Vérifier le mot de passe
        if (password_verify($password, $user['mot_de_passe'])) {
            // Authentification réussie : enregistrer l'ID de l'utilisateur dans la session
            $_SESSION['user_id'] = $user['id'];
            
            // Redirection vers la page d'accueil ou une autre page sécurisée
            sleep(1);
            header("Location: index.php");
            exit();
        } else {
            // Mot de passe incorrect
            echo "<script>alert('Mot de passe incorrect');</script>";
        }
    } else {
        // Aucun utilisateur avec cet e-mail trouvé
        echo "<script>alert('Aucun compte associé à cet e-mail');</script>";
    }

    // Fermer la requête et la connexion à la base de données
    $stmt->close();
    $connexion->close();
}
?>