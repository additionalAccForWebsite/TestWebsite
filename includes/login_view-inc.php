<?php

declare(strict_types= 1);




function CheckLoginErrors(){
    if(isset($_SESSION['errors_login'])){
        $errors = $_SESSION['errors_login'];

        unset($_SESSION['errors_login']);

echo "<br>";
        foreach($errors as $error){
            echo '<p class="form-error">'.$error.'</p>';
        }
    }
    else if(isset($_GET['login'])&& $_GET["login"] === "success"){
        echo '<br>';
        echo '<p class="form-success">HURRA!</p>';
    }
}

function LoginInput(){

    if(isset($_SESSION["login_data"]["email"]) && !isset($_SESSION['errors_login']['noUser']))
    {
        echo '<input type="text" name="email" placeholder="Email" value ="'.$_SESSION["login_data"]["email"].'">';
    }
    else{
        echo '<input type="text" name="email" placeholder="Email">';
    }

    echo '<input type="password" name="pwd" placeholder="Password">';


    

}

function OutputUsername(){

    if(isset($_SESSION["user_id"]))
    {
        echo '<p> You are logged in as ' . $_SESSION["user_email"].'</p>';
    }
    else{
        echo '<p> You are not logged in </p>';
    }


    

}