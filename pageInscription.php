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
        <input type="text" name="nom" required="required">
        <span>Nom :</span>
        <i></i>
        </div>

        <div class="inputBox">
        <input type="text" name="prenom" required="required">
        <span>Prénom :</span>
        <i></i>
        </div>

        <div class="inputBox">
        <input type="text" name="pseudo" required="required">
        <span>Pseudo :</span>
        <i></i>
        </div>

        <div class="inputBox">
        <input type="text" name="mail" required="required">
        <span>E-Mail :</span>
        <i></i>
        </div>
    
        <div class="inputBox">
        <input type="password" name="mdp" required="required">
        <span>Mot de passe :</span>
        <i></i>
        </div>

        <div class="links">
                <a href="pageConnexion.php">Se connecter</a>
        </div>
        <input type="submit" value="S'inscrire" name="Bouton">

        

</form>
</div>  

</body>
</html>