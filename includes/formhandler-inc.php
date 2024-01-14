<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $username = $_POST["username"];
    $password = $_POST["pwd"];
    $email = $_POST["email"];

try{ 
    require_once("dbh-inc.php");
    $query = "INSERT INTO users (username, pwd, email) VALUES 
    (:usrnm,:pwd,:eml);";
    $stmt = $pdo ->prepare($query);
$stmt -> bindParam(":usrnm", $username);
$options = [
    'cost'=>12
];
$hashedPWD =  password_hash($password,PASSWORD_BCRYPT,$options);
$stmt -> bindParam(":pwd",$hashedPWD);
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