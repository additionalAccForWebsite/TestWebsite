<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $username = $_POST["username"];
    $password = $_POST["pwd"];
    $email = $_POST["email"];

try{ 
    require_once("dbh-inc.php");
    require_once 'signup_model-inc.php';
    require_once 'signup_contr-inc.php';


    $errors = [];
    //Error handlers
    if(IsInputEmpty($username,$password, $email)){
        $errors["emptyInput"] = 'Fill in all fields';
    }
    if(IsEmailInvalid($email)){
        $errors["invalidEmail"] = 'Invalid email used';
    }
    if(IsUsernameTaken($pdo,$username)){
        $errors["usernameTaken"] = 'Username already taken';
    }
    if(IsEmailRegistered($pdo,$email)){
        $errors["emailUsed"] = 'Email already registered';
    }

    require_once 'config.php';

    if($errors){
        $_SESSION['errors_signup'] = $errors;
        $signupData = [
            "username" => $username,
            "email"=> $email
        ];
        $_SESSION["signup_data"] = $signupData;

        header("Location: ../index.php");
        die();
    }

        CreateUser($pdo,$username,$password,$email);
        header("Location: ../index.php?signup=success");


        $pdo = null;
        $stmt=null; 
        die();
    



}
catch(PDOException $e){
    die("Query failed: ". $e->getMessage());
}

}
else{
    header("Location: ../index.php");
}