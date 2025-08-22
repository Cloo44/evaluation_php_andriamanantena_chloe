<?php

include "utils/bdd.php";
include "utils/tool.php";
include "model/user.php";

    if (isset($_POST["submit"])) {
        if (!empty($_POST["email"]) && !empty($_POST["password"])) {
            $email = sanitize($_POST["email"]);
            $password = sanitize($_POST["password"]);
            if (isUserByEmailExists($email)) {
               
            $userConnected = findUserByEmail($email);
            
            $hash = $userConnected["password"];
            
                if (passwordVerify($password, $hash)) {
                    session_start();
                    $_SESSION["connected"] = true;
                    $_SESSION["email"] = $email;
                    $_SESSION["id"] = $userConnected["id_users"];

                    header('Location: /index.php');
                    echo "Connecté !";
                }
                return "Le mot de passe est incorrect.";
            }
            return "Ce compte n'existe pas.";
        }
        return "Les champs ne sont pas correctement remplis.";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/style.css">
    <title>Connexion</title>
</head>
<body>
    <h2>Se connecter</h2>
    <form action="#" method="post">
        <input type="email" name="email" id="email" placeholder="Entrez votre email">
        <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe">

        <input type="submit" name="submit" value="Se connecter">
    </form>
    
</body>
</html>