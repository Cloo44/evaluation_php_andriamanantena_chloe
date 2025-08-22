<?php

include "utils/bdd.php";
include "utils/tool.php";
include "model/user.php";

$message = saveUser();

function saveUser() {
    if (isset($_POST["submit"])) {
        if (!empty($_POST["lastname"]) && !empty($_POST["firstname"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
            $lastname = sanitize($_POST["lastname"]);
            $firstname = sanitize($_POST["firstname"]);
            $email = sanitize($_POST["email"]);
            $password = sanitize($_POST["password"]);
            $password = hashPassword($password);
            if (!isUserByEmailExists($email)) {
                addUser();
                return "Le compte a bien été créé.";
            }
            return "Ce compte existe déjà.";
        }
        return "Les champs ne sont pas correctement remplis.";
    }
    return "test";
}

saveUser();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/style.css">
    <title>Inscription</title>
</head>
<body>
    <h2>Inscription</h2>
    <form action="#" method="post">
        <input type="text" name="lastname" id="lastname" placeholder="Nom">
        <input type="text" name="firstname" id="firstname" placeholder="Prénom">
        <input type="email" name="email" id="email" placeholder="Email">
        <input type="password" name="password" id="password" placeholder="Mot de passe">

        <input type="submit" name="submit" value="S'inscrire">
    </form>
    <p><?= $message ?></p>
    
</body>
</html>