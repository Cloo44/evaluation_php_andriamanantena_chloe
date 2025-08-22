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
            $email = $_POST["email"];

            $request = "SELECT u.id_users FROM users AS u WHERE u.email = ?";

            $req = connectBDD()->prepare($request);
            $req->bindParam(1, $email, \PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetch(\PDO::FETCH_ASSOC);

            if (empty($data)) {
                return false;
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

function findUserByEmail($email): array
    {
        try {
            $email = $_POST["email"];

            $request = "SELECT u.id_users AS idUser, u.firstname, u.lastname, u.password, u.email FROM users AS u WHERE u.email = ?";

            $req = connectBDD()->prepare($request);
            $req->bindParam(1, $email, \PDO::PARAM_STR);
            $req->execute();
            
            $req->setFetchMode(\PDO::FETCH_ASSOC);

            return $req->fetch();
            
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    function hashPassword(string $password) : string
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        return $password;
    }

    function passwordVerify(string $password, string $hash) : bool 
    {
        return password_verify($password, $hash);
    }