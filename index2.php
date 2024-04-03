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
            <?php
            $mysqli = new mysqli("localhost", "root", "CDadvtam7347!", "LMC");

            if ($mysqli->connect_error) {
                die("Erreur de connexion à la base de données: " . $mysqli->connect_error);
            }

            $sql = "SELECT id, nom, image, prix FROM produits ORDER BY id ASC";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <li class='art'>
                        
                        <a href='product_details.php?id=<?php echo $row['id']; ?>' class="article-link">
                            <div><img class='photos' src='<?php echo $row['image']; ?>' alt='<?php echo $row['nom']; ?>'></div>
                            <span><?php echo $row['nom']; ?></span>
                            <span class='prix'><?php echo $row['prix']; ?>$</span>
                            <button class="acheter-btn">ACHETER MAINTENANT</button>
                        </a>
                    </li>
                    
            <?php
                }
            } else {
                echo "Aucun produit trouvé";
            }

            $mysqli->close();
            ?>
            
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
