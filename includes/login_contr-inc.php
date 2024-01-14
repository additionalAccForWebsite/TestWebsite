<?php

declare(strict_types= 1);

function IsNoEmail(bool|array $results){
    if(!$results){
        return true;
    }
    else{
        return false;
    }
}

function IsPasswordWrong(string $pwd, string $hashedPwd){
    if(!password_verify($pwd, $hashedPwd)){
        return true;
    }
    else{
        return false;
    }
}

function IsInputEmpty(string $email, string $pwd){
    if(empty($pwd) || empty($email)){
        return true;
    }
    else{
        return false;
    }
}