<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Side bar à gauche</title>
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
            margin-right: auto;
            margin-left: 250px;
        }

        .rechercher input{
            height: 35px;
            width: 250%;
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
        .sidebar-left{
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100%;
            background: #000000;
            transition: 0.5s;
            padding-top: 80px;
            z-index: 2;
        }
        .sidebar.showsidebar{
            left: 100;
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
        </div>
        <div class="icons">
            <a href="#" class="fa fa-heart"></a>
            <a href="#" class="fa fa-shopping-cart"></a>
            <a href="#" class="fa fa-user-circle"></a>
            <a href="#" class="fa fa-bars"></a>
        </div>
    </div>
    <div class="sidebar-left">
        <div class="links">
            <a class="nav-link" href="#">Filtrer par catégorie</a>
            <a class="nav-link" href="#">Trier par prix croissant</a>
            <a class="nav-link" href="#">Trier par prix décroissant</a>
        </div>
    </div>

    <script>
        document.getElementsByClassName("fa-bars")[0].addEventListener("click", function(){
            document.querySelector(".sidebar-left").classList.toggle("showsidebar");
        });
    </script>
</body>
</html>