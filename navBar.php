<header>
        <a href="#" class="logo"><img width="90" height="70" src="images/logoEcommerce.png" alt=""></a>
        <div class="group">
            <ul class="navigation">
                <li><a href="#">Accueil</a></li>
                <li><a href="pageConnexion.php">Connexion</a></li>
                <li><a href="Deconnexion.php">Déconnexion</a></li>
                <li class="dropdown">
                    <a href="#">Test <ion-icon name="caret-down-outline"></ion-icon></a>
                    <ul class="dropdown-content">
                        <li><a href="#">Test</a></li>
                        <li><a href="#">Test</a></li>
                        <li><a href="#">Test</a></li>
                    </ul>
                </li>
                <li><a href="#">Test</a></li>
            </ul>
            <div class="Rechercher">
                <span class="icon">
                    <ion-icon name="search-outline" class="SearchBtn"></ion-icon>
                    <ion-icon name="close-outline" class="CloseBtn"></ion-icon>
                </span>
            </div>
        </div>
        <div class="SearchBox">
            <input type="text" placeholder="Rechercher . . .">
        </div>
    </header>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <script>
        let SearchBtn = document.querySelector('.SearchBtn');
        let CloseBtn = document.querySelector('.CloseBtn');
        let SearchBox = document.querySelector('.SearchBox');
        let navigation = document.querySelector('.navigation');
        let header = document.querySelector('header');
        let lastScrollPosition = window.pageYOffset;

        SearchBtn.onclick = function() {
            SearchBox.classList.add('active');
            CloseBtn.classList.add('active');
            SearchBtn.classList.add('active');
        }

        CloseBtn.onclick = function() {
            SearchBox.classList.remove('active');
            CloseBtn.classList.remove('active');
            SearchBtn.classList.remove('active');
        }

        window.addEventListener('scroll', function() {
            let currentScrollPosition = window.pageYOffset;
            
            if (currentScrollPosition > lastScrollPosition) {
                header.classList.add('hide');
            } else {
                header.classList.remove('hide');
            }

            lastScrollPosition = currentScrollPosition;
        });
    </script>