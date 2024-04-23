<?php
// Include the file to connect to the database
include 'Connect.php';

// Initialize variables
$message = '';
$id = '';
$nom = '';
$prix = '';
$description = '';
$image = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $prix = $_POST["prix"];
    $description = $_POST["description"];
    $image = $_POST["image"];

    // Update the article in the database
    $sql = "UPDATE produits SET nom='$nom', prix='$prix', description='$description', image='$image' WHERE id=$id";

    if ($connexion->query($sql) === TRUE) {
        $message = "L'article a été modifié avec succès.";
    } else {
        $message = "Erreur lors de la modification de l'article : " . $connexion->error;
    }
} elseif(isset($_GET['id'])) { // Check if article ID is provided in the URL parameters
    $id = $_GET['id'];
    
    // Fetch the current data of the article from the database
    $query = "SELECT * FROM produits WHERE id=$id";
    $result = $connexion->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nom = $row["nom"];
        $prix = $row["prix"];
        $description = $row["description"];
        $image = $row["image"];
    } else {
        $message = "Article non trouvé.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un article</title>
    <link rel="stylesheet" href="styleAjoutArticle.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h1>Modifier un article</h1>
    <?php if(isset($message)) { ?>
        <div class="message"><?php echo $message; ?></div>
    <?php } ?>
    <div class="separation"></div>
    <div class="corps-formulaire">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="gauche">
            <div class="groupe">
                <label>Nom de l'article</label>
                <input type="text" name="nom" value="<?php echo $nom; ?>" autocomplete="off" required>
                <i class="fas fa-desktop"></i>
            </div>
            <div class="groupe">
                <label>Prix</label>
                <input type="number" name="prix" value="<?php echo $prix; ?>" autocomplete="off" required>
                <i class="fas fa-euro-sign"></i>
            </div>
            <div class="groupe">
                <label>Lien de l'image de l'article</label>
                <input type="text" name="image" value="<?php echo $image; ?>" autocomplete="off" required>
                <i class="fas fa-image"></i>
            </div>
        </div>

        <div class="droite">
            <div class="groupe">
                <label>Description</label>
                <textarea name="description" placeholder="Saisissez ici..." required><?php echo $description; ?></textarea>
            </div>
        </div>
    </div>

    <div class="pied-formulaire" align="center">
        <button type="submit">Modifier l'article</button>
    </div>
</form>

</body>
</html>
