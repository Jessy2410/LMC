<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        *{
            padding: 0;
            margin: 0;
            font-family: monospace;
            box-sizing: border-box;
        }

        .header{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            background-color: #000000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0px 25px;
            height: 80px;
        }

        .logo img{
            color: rgb(250, 70, 70);
            height: 75px;
        }

        .rechercher {
            display: flex; /* Use flexbox */
            align-items: center; /* Center items vertically */
            margin-right: auto;
            margin-left: 450px; /* Adjust this margin as needed */
        }
        .rechercher input {
            flex: 1; /* Take up remaining space */
            height: 35px;
            width: 600px; /* Make the input fill the available width */
            border: none;
            outline: none;
            border-radius: 10px;
            padding: 10px;
            font-size: 16px;
        }



        .icons{
            text-align: right;
        }

        .icons .fa{
            color: white;
            text-decoration: none;
            font-size: 22px;
            padding: 0px 10px;
            transition: 0.4s;
        }
        .fa:hover{
            color: rgb(250, 70, 70);
        }
        .links{
            margin-top: 80px;
            background-color: #000000;
            height: 0;
            transition: 0.6s;
        }
        .links a{
            color: white;
            text-decoration: none;
            display: block;
            padding: 15px;
            font-size: 18px;
        }
        .links a:hover{
            color: rgb(250, 70, 70); 
        }

        .links .nav-link {
            display: none; /* Cacher les liens par défaut */
            color: white; /* Ajouter les styles appropriés */
            text-decoration: none;
        }

        .links.showlinks .nav-link {
            display: block; /* Afficher les liens lorsque la classe showlinks est présente */
        }
        .showlinks{
            height: 50vh;
        }

        .links2{
            margin-top: 80px;
            background-color: #000000;
            height: 0;
            transition: 0.6s;
        }
        .links2 a{
            color: white;
            text-decoration: none;
            display: block;
            padding: 15px;
            font-size: 18px;
        }
        .links2 a:hover{
            color: rgb(250, 70, 70); 
        }

        .links2 .nav-link {
            display: none; /* Cacher les liens par défaut */
            color: white; /* Ajouter les styles appropriés */
            text-decoration: none;
        }

        .links2.showlinks .nav-link {
            display: block; /* Afficher les liens lorsque la classe showlinks est présente */
        }

        .showlinks{
            height: 50vh;
        }


        .rechercher button {
            color: white;
            background-color:black;
            height: 35px; /* Increase button height */
            width: 35px; /* Increase button width */
            border: none;
            outline: none;
            border-radius: 8px; /* Decrease border radius */
            padding-right: 10px; /* Increase padding for better visual */
            font-size: 20px; /* Increase font size for better visibility */
            margin-left: 7px;
        }
        .rechercher button:hover{
            color: rgb(250, 70, 70);
            height: 35px; /* Increase button height */
            width: 35px; /* Increase button width */
             /* Increase padding for better visual */
            font-size: 18px; /* Increase font size for better visibility */
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="#"><img src="images/logoEcommerce.png" alt=""></a>
        </div>
        <div class="rechercher">
            <form>
                <input type="text" placeholder="Rechercher..." id="">
            </form>
            <button type="button" class="fa fa-search"></button>
        </div>
        <div class="icons">
            <a href="#" class="fa fa-heart"></a>
            <a href="#" class="fa fa-shopping-cart"></a>
            <a href="#" class="fa fa-user-circle"></a>
            <a href="#" class="fa fa-reorder"></a>
        </div>
    </div>
    <div class="links">
        <a class="nav-link" href="#">Profil</a>
        <a class="nav-link" href="#">Articles</a>
        <a class="nav-link" href="#">Mon panier</a>
        <a class="nav-link" href="#">Mes favoris</a>
        <a class="nav-link" href="pageConnexion.php">Se connecter</a>
        <a class="nav-link" href="#">Besoin d'aide</a>
    </div>
    <div class="links2">
        <a class="nav-link" href="#">Mon panier</a>
        <a class="nav-link" href="#">Mes favoris</a>
        <a class="nav-link" href="#">Mes précedentes commandes</a>
    </div>

    <script>
        // Ajouter un event listener au troisième élément "fa"
        document.getElementsByClassName("fa")[3].addEventListener("click", function(){
            // Fermer le menu déroulant de liens 2 (si ouvert)
            var links2 = document.getElementsByClassName("links2")[0];
            links2.classList.remove("showlinks");

            // Ouvrir/fermer le menu déroulant de liens 1
            var links1 = document.getElementsByClassName("links")[0];
            links1.classList.toggle("showlinks");
        });

        // Ajouter un event listener au quatrième élément "fa"
        document.getElementsByClassName("fa")[2].addEventListener("click", function(){
            // Fermer le menu déroulant de liens 1 (si ouvert)
            var links1 = document.getElementsByClassName("links")[0];
            links1.classList.remove("showlinks");

            // Ouvrir/fermer le menu déroulant de liens 2
            var links2 = document.getElementsByClassName("links2")[0];
            links2.classList.toggle("showlinks");
        });

        // Ajouter un event listener pour fermer les menus déroulants lors d'un clic en dehors d'eux
        document.addEventListener("click", function(event) {
            // Vérifier si l'élément cliqué n'est pas dans les menus déroulants
            if (!event.target.closest(".fa") && !event.target.closest(".links") && !event.target.closest(".links2")) {
                // Fermer le menu déroulant de liens 1 (si ouvert)
                var links1 = document.getElementsByClassName("links")[0];
                links1.classList.remove("showlinks");

                // Fermer le menu déroulant de liens 2 (si ouvert)
                var links2 = document.getElementsByClassName("links2")[0];
                links2.classList.remove("showlinks");
            }
        });

    </script>

</body>
</html>
