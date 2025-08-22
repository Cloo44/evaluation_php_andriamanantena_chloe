<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/style.css">
    <title>Déconnexion</title>
</head>
<body>
    <h2>Se déconnecter</h2>
    <form action="" method="post">
        <input type="submit" value="Se déconnecter">
    </form>
    
</body>
</html>

<?php

function deconnexion()
    {
        session_destroy();
        header('Location: /index.php/');
    }

deconnexion();

?>