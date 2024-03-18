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
            height: 50px;
        }

        .rechercher {
            margin-right: auto;
            margin-left: 450px;
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
        .links{
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
            <a href="#" class="fa fa-reorder"></a>
        </div>
    </div>
    <div class="links">
        <a href="#">Profil</a>
        <a href="#">Articles</a>
        <a href="#">Mon panier</a>
        <a href="#">Mes favoris</a>
        <a href="#">Se connecter</a>
        <a href="#">Besoin d'aide</a>
    </div>

    <script>
        document.getElementsByClassName("fa")[3].addEventListener("click", function(){
            document.getElementsByClassName("links")[0].classList.toggle("showlinks");
        });
    </script>

</body>
</html>
