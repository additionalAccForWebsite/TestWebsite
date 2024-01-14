<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $username = $_POST["username"];
    $password = $_POST["pwd"];
    $email = $_POST["email"];

try{ 
    require_once("dbh-inc.php");
    $query = "DELETE FROM users WHERE username = :usrnm AND pwd = :pwd;";
    $stmt = $pdo ->prepare($query);
$stmt -> bindParam(":usrnm", $username);
$stmt -> bindParam(":pwd", $password);

    $stmt -> execute();

    $pdo = null;
    $stmt = null;

    header("Location: ../index.php");

    die();


}
catch(PDOException $e){
    die("Query failed: ". $e->getMessage());
}

}
else{
    header("Location: ../index.php");
}