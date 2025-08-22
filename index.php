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
            
            <ul>
                <!-- Menu connecté -->
                <?php if (isset($_SESSION["connected"])) : ?>
                <li><a href="addBook.php">Ajouter un livre à sa collection</a></li>
                <li><a href="showAllBook.php">Afficher sa collection</a></li>
                <li><a href="deconnexion.php">Se déconnecter</a></li>

            <!-- Menu déconnecté -->
                <?php else : ?>              
                <li><a href="register.php">S'inscrire</a></li>
                <li><a href="connexion.php">Se connecter</a></li> 
                <?php endif ?>               
            </ul>
        </nav>
        
    </body>
</html>

<?php
    session_start();
    
?>