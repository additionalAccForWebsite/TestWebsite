<?php

declare(strict_types= 1);


function GetUsername(object $pdo, string $username){
    $query = "SELECT username FROM users WHERE username = :username;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $result = $stmt ->fetch(PDO::FETCH_ASSOC);
    return $result;

}

function GetEmail(object $pdo, string $email){
    $query = "SELECT email FROM users WHERE email = :eml;";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":eml", $email);
    $stmt->execute();
    $result = $stmt ->fetch(PDO::FETCH_ASSOC);
    return $result;

}

function SetUser(object $pdo,string $username, string $pwd, string $email){
    $query = "INSERT INTO users (username, pwd, email) VALUES 
    (:usrnm,:pwd,:eml);";
    $stmt = $pdo ->prepare($query);
    $stmt -> bindParam(":usrnm", $username);
    $options = [
        'cost'=>12
    ];
    $hashedPWD =  password_hash($pwd,PASSWORD_BCRYPT,$options);
    $stmt -> bindParam(":pwd",$hashedPWD);
    $stmt -> bindParam(":eml", $email);

    $stmt -> execute();

    $pdo = null;
    $stmt = null;

    header("Location: ../index.php");
}