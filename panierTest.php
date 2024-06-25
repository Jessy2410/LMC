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
  <?php include("navbar.php") ?>

  <?php
  require_once 'Connect.php';

  $product_id = $_GET['id'];
  $sql = "SELECT * FROM produits WHERE id = $product_id";
  $result = $connexion->query($sql);

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
  ?>

  <div class="card">
    <div class="left">
      <div class="carousel">
        <img src="<?php echo $row['image']; ?>" id="mainImg" alt="">
        <button class="prev" onclick="prevImage()">&#10094;</button>
        <button class="next" onclick="nextImage()">&#10095;</button>
      </div>
      <div class="thumbnails">
        <img src="<?php echo $row['image']; ?>" alt="" onclick="clk(this)">
        <img src="<?php echo $row['image2']; ?>" alt="" onclick="clk(this)">
        <img src="<?php echo $row['image3']; ?>" alt="" onclick="clk(this)">
        <img src="<?php echo $row['image4']; ?>" alt="" onclick="clk(this)">
        <img src="<?php echo $row['image5']; ?>" alt="" onclick="clk(this)">
      </div>
    </div>

    <div class="right">
      <h1><?php echo $row['nom']; ?></h1>
      <h1><?php echo $row['prix']; ?>€</h1>
      <h3><?php echo $row['description']; ?></h3>
      <form action='ajouter_panier.php' method='post'>
        <input type='hidden' name='product_id' value="<?php echo $row['id']; ?>">
        <button class="btnPanier" type='submit'><ion-icon class='ico' name='cart'></ion-icon> Ajouter au panier</button>
      </form>
      <br>
      <form action='ajouter_fav.php' method='post'>
        <input type='hidden' name='product_id' value="<?php echo $row['id']; ?>">
        <button class="btnPanier" type='submit'><ion-icon class='ico' name='heart'></ion-icon> Ajouter aux favoris</button>
      </form>
    </div>
  </div>

 <!-- Section des commentaires -->
 <!-- <div class="comment-section">
    <h2>Commentaires</h2>
    <form action="ajouter_commentaire.php" method="post">
      <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
      <textarea name="commentaire" placeholder="Écrire un commentaire..." required></textarea>
      <button type="submit" class="btnCommentaire">Soumettre</button>
    </form>

    <?php
    $sql_comments = "SELECT * FROM commentaires WHERE product_id = $product_id ORDER BY created_at DESC";
    $result_comments = $connexion->query($sql_comments);

    if ($result_comments->num_rows > 0) {
        while($comment = $result_comments->fetch_assoc()) {
            echo "<div class='comment'>";
            echo "<p><strong>" . $comment['user_name'] . ":</strong></p>";
            echo "<p>" . $comment['commentaire'] . "</p>";
            echo "<p class='comment-date'>" . $comment['created_at'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>Aucun commentaire pour ce produit.</p>";
    }
    ?>
  </div> -->

  <script>
    function clk(newImg){
        let getImg = document.getElementById("mainImg");
        getImg.src = newImg.src;
    }

    let currentImageIndex = 0;
    const images = [
        "<?php echo $row['image']; ?>",
        "<?php echo $row['image2']; ?>",
        "<?php echo $row['image3']; ?>",
        "<?php echo $row['image4']; ?>",
        "<?php echo $row['image5']; ?>"
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

  <?php
  } else {
      echo "Aucun produit trouvé";
  }
  ?>
</body>
</html>
