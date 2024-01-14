<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $email = $_POST["email"];
    $password = $_POST["pwd"];

    try{ 
    require_once("dbh-inc.php");
    require_once 'login_model-inc.php';
    require_once 'login_contr-inc.php';


    //Error handlers
    $errors = [];
    if(IsInputEmpty($email,$password)){
        $errors["emptyInput"] = 'Fill in all fields';
    }

    $result = GetUser($pdo,$email);
    if(IsNoEmail($result)){
        $errors["noUser"] = 'There is no user with this email';
    }
    if(!IsNoEmail($result) && IsPasswordWrong($password,$result["pwd"])){
        $errors["wrongPassword"] = 'Wrong password';
    }

    require_once 'config.php';

    if($errors){
        $_SESSION['errors_login'] = $errors;
        $signupData = [
            "email"=> $email
        ];
        $_SESSION["login_data"] = $signupData;

        header("Location: ../index.php");
        die();
    }

    $newSessionId = session_create_id();
    $sessionId = $newSessionId . "_" . $result['id'];
    session_id($sessionId);

    $_SESSION["user_id"]=$result["id"];
    $_SESSION["user_email"]=htmlspecialchars($result["email"]);
    $_SESSION['last_regeneration'] = time(); 

    header("Location: ../index.php?login=success");

    $pdo = null;
    $stmt = null;
    die();

    }
    catch(PDOException $e){
        die("Query failed: ". $e->getMessage());
        }
}
else{
    header("Location: ../index.php");
    die();
}