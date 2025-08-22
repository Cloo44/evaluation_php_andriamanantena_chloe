<?php
    //page d'accueil avec menu connecté / déconnecté
    // <?php if (isset($_SESSION["connected"])) :
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./public/style.css">
        <title>Accueil</title>
    </head>
    <body>
        <nav>
            <!-- Menu connecté -->
            <ul>
                <li><a href="addBook.php">Ajouter un livre à sa collection</a></li>
                <li><a href="showAllBook.php">Afficher sa collection</a></li>
                <li><a href="deconnexion.php">Se déconnecter</a></li>

            <!-- Menu déconnecté -->                
                <li><a href="register.php">S'inscrire</a></li>
                <li><a href="connexion.php">Se connecter</a></li>                
            </ul>
        </nav>
        
    </body>
</html>