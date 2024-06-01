<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styleNav.css">
</head>
<body>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<nav>

  <div class="wrapper">
    <div><a href="index.php"><img class="imageLogo" src="images/LOGOLMCDEF.png" alt=""></a></div>
    <input class="inp" type="radio" name="slider" id="menu-btn">
    <input class="inp" type="radio" name="slider" id="close-btn">
    <ul class="nav-links">
        
      <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
      <li>
        <input type="text" class="search-bar" placeholder="Search">
        <button class="btn-4"><b><ion-icon class="btnSearch" name="search-outline"></ion-icon></b></button>
    </li>
      <li class="liste"><a class="lien" href="index.php"><ion-icon class="ic" name="home"></ion-icon></a></li>
      <li class="liste"><a class="lien" href="panier.php"><ion-icon class="ic" name="cart"></ion-icon></a></li>
      <li class="liste"><a class="lien" href="favoris.php"><ion-icon class="ic" name="heart"></ion-icon></a></li>
      <li class="liste">
        <a href="#" class="lien"><ion-icon class="ic" name="person-circle-outline"></ion-icon></a>
        <input class="inp" type="checkbox" id="showMega">
        <label for="showMega" class="mobile-item">Mega Menu</label>
        <div class="mega-box">
          <div class="content">
            <div class="row">
              <img src="images/p1.png" alt="">
            </div>
            <div class="row">
              <header>Mon compte</header>
              <ul class="mega-links">
                <li class="lis"><a class="a" href="#">Mes informations</a></li>
                <li class="lis"><a class="a" href="pageConnexion2.php">Se Connecter</a></li>
                <li class="lis"><a class="a" href="pageConnexion2.php">S'inscrire</a></li>
                <li class="lis"><a class="a" href="pageDeconnexion.php">Se déconnecter</a></li>
              </ul>
            </div>
            <div class="row">
              <header>Articles</header>
              <ul class="mega-links">
                <li><a href="ListeArticleAdmin.php">Gérer les articles</a></li>
                <li><a href="dashboard.html">DashBoard</a></li>
                <li><a href="#">Mobile Email</a></li>
                <li><a href="#">Web Marketing</a></li>
              </ul>
            </div>
            <div class="row">
              <header>Security services</header>
              <ul class="mega-links">
                <li><a href="#">Site Seal</a></li>
                <li><a href="#">VPS Hosting</a></li>
                <li><a href="#">Privacy Seal</a></li>
                <li><a href="#">Website design</a></li>
              </ul>
            </div>
          </div>
        </div>
      </li>
    </ul>
    <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
  </div>
</nav>

</body>
</html>
