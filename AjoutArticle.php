<?php
// Inclure le fichier de connexion à la base de données

include 'Connect.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $prix = $_POST["prix"];
    $description = $_POST["description"];
    $image = $_POST["image"];

    // Vérifier si le champ de prix n'est pas vide
    if(empty($prix)) {
        $message = "Le champ Prix ne peut pas être vide.";
    } else {
        // Préparer et exécuter la requête SQL pour insérer les données dans la table "produits"
        $sql = "INSERT INTO produits (nom, prix, description, image) VALUES ('$nom', '$prix', '$description', '$image')";

        if ($connexion->query($sql) === TRUE) {
            $message = "Le produit a été ajouté avec succès.";
            // Réinitialiser les valeurs du formulaire après l'ajout
            $_POST = array();
        } else {
            $message = "Erreur lors de l'ajout du produit : " . $connexion->error;
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

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h1>Ajoutez un article</h1>
    <?php if(isset($message)) { ?>
        <div class="message"><?php echo $message; ?></div>
    <?php } ?>
    <div class="separation"></div>
    <div class="corps-formulaire">
        <div class="gauche">
            <div class="groupe">
                <label>Nom de l'article</label>
                <input type="text" name="nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" autocomplete="off" />
                <i class="fas fa-desktop"></i>
            </div>
            <div class="groupe">
                <label>Prix</label>
                <input type="number" name="prix" value="<?php if(isset($_POST['prix'])) { echo $_POST['prix']; } ?>" autocomplete="off" />
                <i class="fas fa-euro-sign"></i>
            </div>
            <div class="groupe">
                <label>Lien de l'image de l'article</label>
                <input type="text" name="image" value="<?php if(isset($_POST['image'])) { echo $_POST['image']; } ?>" autocomplete="off" />
                <i class="fas fa-image"></i>
            </div>
        </div>

        <div class="droite">
            <div class="groupe">
                <label>Description</label>
                <textarea name="description" placeholder="Saisissez ici..."><?php if(isset($_POST['description'])) { echo $_POST['description']; } ?></textarea>
            </div>
        </div>
    </div>

    <div class="pied-formulaire" align="center">
        <button type="submit">Ajouter l'article</button>
    </div>
</form>

</body>
</html>
