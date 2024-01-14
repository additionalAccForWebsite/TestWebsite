<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $username = $_POST["username"];
    $password = $_POST["pwd"];
    $email = $_POST["email"];

try{ 
    require_once("dbh-inc.php");
    $query = "UPDATE users SET pwd = :pwd, 
    email =:eml WHERE username = :usrnm;";
    $stmt = $pdo ->prepare($query);
$stmt -> bindParam(":usrnm", $username);
$stmt -> bindParam(":pwd", $password);
$stmt -> bindParam(":eml", $email);

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