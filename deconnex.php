<?php
session_start();
session_unset(); // Supprime les données de session
session_destroy(); // Détruit la session
header('Location: pageConnexion.php'); // Redirection après déconnexion
?>
