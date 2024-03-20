<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMC</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/3010b1eaf1.js" crossorigin="anonymous"></script>
</head>
<body>

<!-- Partie Navbar -->
    
<?php include("navbar.php")?>

    <!-- Patie Articles -->

    <section id="article">
        <h1 class="section_title">Nos Articles</h1>
        <div class="images">
            <ul>
                <li class="art">
                   <div>
                       <img class="photos" src="images/pc2.jpg" alt="">
                   </div>
                   <span>Article</span>
                   <span class="prix">0$</span>
                   <button><a href="#">ACHETER MAINTENANT</a></button>
                </li>
                <li class="art">
                    <div>
                        <img class="photos" src="images/pc2.jpg" alt="">
                    </div>
                    <span>Article</span>
                    <span class="prix">0$</span>
                    <button><a href="#">ACHETER MAINTENANT</a></button>
                 </li>
                 <li class="art">
                    <div>
                        <img class="photos" src="images/pc2.jpg" alt="">
                    </div>
                    <span>Article</span>
                    <span class="prix">0$</span>
                    <button><a href="#">ACHETER MAINTENANT</a></button>
                 </li>
                 <li class="art">
                    <div>
                        <img class="photos" src="images/pc2.jpg" alt="">
                    </div>
                    <span>Article</span>
                    <span class="prix">0$</span>
                    <button><a href="#">ACHETER MAINTENANT</a></button>
                 </li>
                 <li class="art">
                    <div>
                        <img class="photos" src="images/pc2.jpg" alt="">
                    </div>
                    <span>Article</span>
                    <span class="prix">0$</span>
                    <button><a href="#">ACHETER MAINTENANT</a></button>
                 </li>
                 <li class="art">
                    <div>
                        <img class="photos" src="images/pc2.jpg
                        " alt="">
                    </div>
                    <span>Article</span>
                    <span class="prix">0$</span>
                    <button><a href="#">ACHETER MAINTENANT</a></button>
                 </li>
            </ul>
        </div>
    </section>   

    <script>

        var menu_toggle = document.querySelector('.menu_toggle');
        var menu = document.querySelector('.menu');
        var menu_toggle_span = document.querySelector('.menu_toggle span');

        menu_toggle.onclick = function(){
            menu_toggle.classList.toggle('active');
            menu_toggle_span.classList.toggle('active');
            menu.classList.toggle('responsive') ;
        }

    </script>

    <?php include("footer.php")?>

</body>
</html>