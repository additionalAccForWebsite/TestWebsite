<?php

declare(strict_types= 1);

function IsInputEmpty(string $username, string $pwd, string $email){
    if(empty($username) || empty($pwd) || empty($email)){
        return true;
    }
    else{
        return false;
    }
}

function IsEmailInvalid(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else{
        return false;
    }
}

function IsUsernameTaken(object $pdo, string $username){
    if(GetUsername($pdo,$username)){
        return true;
    }
    else{
        return false;
    }
}
function IsEmailRegistered(object $pdo, string $email){
    if(GetEmail($pdo,$email)){
        return true;
    }
    else{
        return false;
    }
}

    function CreateUser(object $pdo,string $username, string $pwd, string $email){
        SetUser( $pdo, $username,  $pwd,  $email);
    }