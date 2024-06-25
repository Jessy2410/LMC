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
    $nom = isset($_POST["nom"]) ? $_POST["nom"] : '';
    $prix = isset($_POST["prix"]) ? $_POST["prix"] : '';
    $description = isset($_POST["description"]) ? $_POST["description"] : '';
    $image = isset($_POST["image"]) ? $_POST["image"] : '';
    $image2 = isset($_POST["image2"]) ? $_POST["image2"] : '';
    $image3 = isset($_POST["image3"]) ? $_POST["image3"] : '';
    $image4 = isset($_POST["image4"]) ? $_POST["image4"] : '';
    $image5 = isset($_POST["image5"]) ? $_POST["image5"] : '';

    // Vérifier si tous les champs du formulaire sont remplis
    if (empty($nom) || empty($prix) || empty($description) || empty($image) || empty($image2) || empty($image3) || empty($image4) || empty($image5)) {
        $message = "Veuillez remplir tous les champs du formulaire.";
    } else {
        // Préparer et exécuter la requête SQL pour insérer les données dans la table "produits"
        $sql = "INSERT INTO produits (nom, prix, description, image, image2, image3, image4, image5) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        // Préparer la requête
        $stmt = $connexion->prepare($sql);

        // Vérifier si la préparation de la requête est réussie
        if ($stmt === false) {
            die('Erreur de préparation de la requête : ' . $connexion->error);
        }

        // Liaison des paramètres et exécution de la requête
        $stmt->bind_param("sdssssss", $nom, $prix, $description, $image, $image2, $image3, $image4, $image5);

        if ($stmt->execute()) {
            $message = "Le produit a été ajouté avec succès.";
            // Réinitialiser les valeurs du formulaire après l'ajout
            $_POST = array();
        } else {
            $message = "Erreur lors de l'ajout du produit : " . $stmt->error;
        }

        // Fermer la requête
        $stmt->close();
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

<form method="post" action="">
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
                <input type="number" step="0.01" name="prix" value="<?php if(isset($_POST['prix'])) { echo htmlspecialchars($_POST['prix']); } ?>" autocomplete="off" required />
                <i class="fas fa-euro-sign"></i>
            </div>
            <div class="groupe">
                <label>Lien de l'image de l'article</label>
                <input type="text" name="image" value="<?php if(isset($_POST['image'])) { echo htmlspecialchars($_POST['image']); } ?>" autocomplete="off" required />
                <i class="fas fa-image"></i>
            </div>
            <div class="groupe">
                <label>Lien de l'image 2</label>
                <input type="text" name="image2" value="<?php if(isset($_POST['image2'])) { echo htmlspecialchars($_POST['image2']); } ?>" autocomplete="off" required />
                <i class="fas fa-image"></i>
            </div>
            <div class="groupe">
                <label>Lien de l'image 3</label>
                <input type="text" name="image3" value="<?php if(isset($_POST['image3'])) { echo htmlspecialchars($_POST['image3']); } ?>" autocomplete="off" required />
                <i class="fas fa-image"></i>
            </div>
            <div class="groupe">
                <label>Lien de l'image 4</label>
                <input type="text" name="image4" value="<?php if(isset($_POST['image4'])) { echo htmlspecialchars($_POST['image4']); } ?>" autocomplete="off" required />
                <i class="fas fa-image"></i>
            </div>
            <div class="groupe">
                <label>Lien de l'image 5</label>
                <input type="text" name="image5" value="<?php if(isset($_POST['image5'])) { echo htmlspecialchars($_POST['image5']); } ?>" autocomplete="off" required />
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
