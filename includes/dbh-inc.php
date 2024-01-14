<?php

$dsn = "mysql:host=localhost;dbname=clientdatabase";
$dbusername = "root";
$dbpwd = "";

try{
    $pdo = new PDO($dsn,$dbusername,$dbpwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
echo "Connection Fail" . $e->GetMessage();
}

