<?php

// requêtes SQL de la table users

function addUser() {
    try {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $request = "INSERT INTO users(firstname, lastname, email, password) VALUE (?,?,?,?)";
            
        $req = connectBDD()->prepare($request);
            
        $req->bindParam(1, $firstname, \PDO::PARAM_STR);
        $req->bindParam(2, $lastname, \PDO::PARAM_STR);
        $req->bindParam(3, $email, \PDO::PARAM_STR);
        $req->bindParam(4, $password, \PDO::PARAM_STR);
            
        $req->execute();
    }
    catch(Exception $e) {
        return "Enregistrement impossible.";
    }

}

function isUserByEmailExists(): bool
    {
        try {
            //Récupération de la valeur de name (category)
            $email = $_POST["email"];
            //Ecrire la requête SQL
            $request = "SELECT u.id_users FROM users AS u WHERE u.email = ?";
            //préparer la requête
            $req = connectBDD()->prepare($request);
            //assigner le paramètre
            $req->bindParam(1, $email, \PDO::PARAM_STR);
            //exécuter la requête
            $req->execute();
            //récupérer le resultat
            $data = $req->fetch(\PDO::FETCH_ASSOC);
            //Test si l'enrgistrement est vide
            if (empty($data)) {
                return false;
            }
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }