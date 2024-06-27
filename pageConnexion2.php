<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="style8.css">
</head>
<body>
  
<?php
  include("navbar.php");
?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     $(".info-item .btn").click(function(){
        //         $(".container").toggleClass("log-in");
        //     });
        //     $(".container-form .btn").click(function(){
        //         $(".container").addClass("active");
        //     });
        // });

        $(document).ready(function() {
            $(".info-item .btn").click(function(){
                $(".container").toggleClass("log-in");
            });

            $(".container-form .btn").click(function(){
                var valid = true;
                $(this).closest('form').find('input').each(function() {
                    if (!$(this).val()) {
                        valid = false;
                        $(this).css('border', '1px solid red'); // Highlight empty fields
                    } else {
                        $(this).css('border', 'none'); // Reset border if filled
                    }
                });

                if (valid) {
                    $(".container").addClass("active");
                } 
            });
        });
    </script>

    <div class="container">
        <div class="box"></div>
        <div class="container-forms">
          <div class="container-info">
            <div class="info-item">
              <div class="table">
                <div class="table-cell">
                  <p>
                    Déjà inscris ?
                  </p>
                  <div class="btn">
                    Se connecter
                  </div>
                </div>
              </div>
            </div>
            <div class="info-item">
              <div class="table">
                <div class="table-cell">
                  <p>
                    Toujours pas inscris? 
                  </p>
                  <div class="btn">
                    S'inscrire
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container-form">
            <div class="form-item log-in">
            <h2>Connectez-vous</h2>
              <div class="table">
                  <div class="table-cell">
                      <form method="post" action="script_connexion.php">
                          <input name="Nom" type="text" required placeholder="Nom">
                          <input name="Prenom" type="text" required placeholder="Prenom">
                          <input name="email" required placeholder="Email" type="text">
                          <input name="password" required placeholder="Password" type="password">
                          <button type="submit" class="btn">Se connecter</button>
                      </form>
                  </div>
              </div>
            </div>
            <div class="form-item sign-up">
            <h2>Inscrivez-vous</h2>
              <div class="table">
                <div class="table-cell">
                  <form method="post" action="script_inscription.php">
                      <input name="email" required placeholder="Email" type="text">
                      <input name="prenom" required placeholder="prénom" type="text">
                      <input name="nom" required placeholder="nom" type="text">
                      <input name="password" required placeholder="Password" type="Password">
                      <button type="submit" class="btn">S'inscrire</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>
</html>