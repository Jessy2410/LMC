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
            <a href="#">Mot de passe oublié ?</a>
            <a href="pageInscription.php">S'inscrire ?</a>
        </div>
        <input type="submit" value="Connexion" name="btnConnexion">
        
</div>


</body>
</html>