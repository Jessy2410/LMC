<?php
require_once 'Connect.php';

// Démarrez la session
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: pageConnexion2.php");
    exit();
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $prix = $_POST["prix"];
    $description = $_POST["description"];
    $image = $_POST["image"];

    // Vérifier si tous les champs du formulaire sont remplis
    if (empty($nom) || empty($prix) || empty($description) || empty($image)) {
        $message = "Veuillez remplir tous les champs du formulaire.";
    } else {
        // Préparer et exécuter la requête SQL pour insérer les données dans la table "produits"
        $sql = "INSERT INTO produits (nom, prix, description, image, nbConsult) VALUES (?, ?, ?, ?, 0)";

        // Préparer la requête
        $stmt = $connexion->prepare($sql);

        // Liaison des paramètres et exécution de la requête
        if ($stmt) {
            $stmt->bind_param("sdsi", $nom, $prix, $description, $image);
            if ($stmt->execute()) {
                $message = "Le produit a été ajouté avec succès.";
                // Réinitialiser les valeurs du formulaire après l'ajout
                $_POST = array();
            } else {
                $message = "Erreur lors de l'ajout du produit : " . $connexion->error;
            }
            $stmt->close();
        } else {
            $message = "Erreur de préparation de la requête : " . $connexion->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Formulaire Ajouter Article</title>
    <link rel="stylesheet" href="styleAjoutArticle.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />
</head>
<body>

<form method="post" action="ListeArticleAdmin.php">
    <h1>Ajoutez un article</h1>
    <?php if(isset($message)) { ?>
        <div class="message"><?php echo $message; ?></div>
    <?php } ?>
    <div class="separation"></div>
    <div class="corps-formulaire">
        <div class="gauche">
            <div class="groupe">
                <label>Nom de l'article</label>
                <input type="text" name="nom" value="<?php if(isset($_POST['nom'])) { echo htmlspecialchars($_POST['nom']); } ?>" autocomplete="off" required />
                <i class="fas fa-desktop"></i>
            </div>
            <div class="groupe">
                <label>Prix</label>
                <input type="number" name="prix" value="<?php if(isset($_POST['prix'])) { echo htmlspecialchars($_POST['prix']); } ?>" autocomplete="off" required />
                <i class="fas fa-euro-sign"></i>
            </div>
            <div class="groupe">
                <label>Lien de l'image de l'article</label>
                <input type="text" name="image" value="<?php if(isset($_POST['image'])) { echo htmlspecialchars($_POST['image']); } ?>" autocomplete="off" required />
                <i class="fas fa-image"></i>
            </div>
        </div>

        <div class="droite">
            <div class="groupe">
                <label>Description</label>
                <textarea name="description" placeholder="Saisissez ici..." required><?php if(isset($_POST['description'])) { echo htmlspecialchars($_POST['description']); } ?></textarea>
            </div>
        </div>
    </div>

    <div class="pied-formulaire">
        <button type="submit">Ajouter l'article</button>
    </div>
</form>

</body>
</html>
