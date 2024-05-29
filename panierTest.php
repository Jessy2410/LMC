<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Card/Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylePanier.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
  <body>
  <?php include("navbar.php")?>

        <?php
        require_once 'Connect.php';
    
        $product_id = $_GET['id'];
        $sql = "SELECT * FROM produits WHERE id = $product_id";
        $result = $connexion->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        ?>

<div class="card">
        <div class="img">
            <img src="<?php echo $row['image']; ?>"  alt="" onclick="clk(this)"> <br>
            <img src="<?php echo $row['image2']; ?>" alt="" onclick="clk(this)"> <br>
            <img src="<?php echo $row['image3']; ?>" alt="" onclick="clk(this)"> <br>

        </div>
        <div class="left">
            <div class="carousel">
                <img src="<?php echo $row['image']; ?>" id="mainImg" alt="">
                <button class="prev" onclick="prevImage()">&#10094;</button>
                <button class="next" onclick="nextImage()">&#10095;</button>
            </div>
        </div>


        <div class="right">
            <h3><?php echo $row['nom']; ?></h3>
            <h1><?php echo $row['prix']; ?>€</h1>
            
            <button class="CartBtn">
                <span class="IconContainer"> 
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" fill="rgb(255, 255, 255)" class="cart"><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"></path></svg>
                </span>
                <p class="text">Ajouter au panier</p>
            </button>
            <br>
            <button class="CartBtn">
                <span class="IconContainer"> 
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 24 24" fill="rgb(255, 255, 255)" class="heart">
                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                    </svg>
                </span>
                <p class="text">Ajouter aux favoris</p>
            </button>

            
            <h3>Note du produit</h3>
            <form action="script_eval.php" method="POST">
                <input type="hidden" name="id_produit" value="<?php echo $row['id']; ?>">
                <label for="note">Note :</label>
                <select name="note" id="note" required>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <br>
                <button type="submit">Soumettre</button>
            </form>
                <?php
                $sql_eval = "SELECT AVG(note) AS moyenne FROM evaluations WHERE id_produit = $product_id";
                $result_eval = $connexion->query($sql_eval);
                if ($result_eval->num_rows > 0) {
                    while($eval = $result_eval->fetch_assoc()) {
                        echo "<p>Note: " . $eval['moyenne'] . "/5</p>";
                    }
                } else {
                    echo "<p>Aucune évaluation pour ce produit.</p>";
                }
                ?>
            
        </div>
    </div>

    <script>
        function clk(newImg){
            let getImg=document.getElementById("imgs");
            getImg.src=newImg.src;
        }
    </script>

    <script>
        // Sélectionnez toutes les miniatures d'images
        const thumbnails = document.querySelectorAll('.img img');

        // Sélectionnez l'image principale
        const mainImage = document.querySelector('.left img');

        // Parcourez chaque miniature et ajoutez un écouteur de clic
        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', () => {
                // Mettez à jour l'URL de l'image principale avec l'URL de la miniature cliquée
                mainImage.src = thumbnail.src;
            });
        });

    </script>
    
    <script>
      // JavaScript
      let currentImageIndex = 0;
      const images = [
          "<?php echo $row['image']; ?>", // Replace this with the URL of your first image
          "<?php echo $row['image2']; ?>", // Replace this with the URL of your second image
          "<?php echo $row['image3']; ?>"  // Replace this with the URL of your third image
      ];
      const mainImg = document.getElementById('mainImg');

      function showImage(index) {
          mainImg.src = images[index];
      }

      function nextImage() {
          currentImageIndex = (currentImageIndex + 1) % images.length;
          showImage(currentImageIndex);
      }

      function prevImage() {
          currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
          showImage(currentImageIndex);
      }

      document.addEventListener("DOMContentLoaded", function() {
          const thumbnails = document.querySelectorAll('.left .carousel .image-container img');
          thumbnails.forEach((thumbnail, index) => {
              thumbnail.addEventListener('click', () => {
                  currentImageIndex = index;
                  showImage(currentImageIndex);
              });
          });
      });
    </script>

    <div class="related">
        <h2>related items</h2>
        <div class="row">
            <div class="columns">
                <div class="items">
                    <img src="<?php echo $row['image']; ?>" alt="">
                    <div class="details">
                        <p>Woman Brown Solid Biker Jacket</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                        </div>

                        <p>USD $120.00</p>

                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="items">
                    <img src="<?php echo $row['image']; ?>" alt="">
                    <div class="details">
                        <p>Navy Blue Flared Palazzos</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>

                        <p>USD $80.00</p>

                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="items">
                    <img src="<?php echo $row['image']; ?>" alt="">
                    <div class="details">
                        <p>Jacquard Banarasi Dupatta</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>

                        <p>USD $110.00</p>

                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="items">
                    <img src="<?php echo $row['image']; ?>" alt="">
                    <div class="details">
                        <p>Printed Straight Kurta</p>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <i class="fa fa-star-o"></i>
                        </div>

                        <p>USD $100.00</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php
        } else {
            echo "Aucun produit trouvé";
        }
        ?>
    


</body>
</html>