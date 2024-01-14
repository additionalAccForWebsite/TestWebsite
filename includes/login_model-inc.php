<?php

declare(strict_types= 1);

function GetUser(object $pdo, string $email){
    $query = "SELECT * FROM users WHERE email = :eml;";
    $stmt = $pdo ->prepare($query);
    $stmt -> bindParam(":eml", $email);

    $stmt -> execute();

    $result = $stmt -> fetch(PDO::FETCH_ASSOC);

    return $result;
}