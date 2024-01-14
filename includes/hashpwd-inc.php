<?php


$sensitiveData = "Kalyta";
$salt = bin2hex(random_bytes(16));
$pepper = "SRAKA";

$cachedSalt = $salt;
$cachedPepper = $pepper;

$dataToHash = $sensitiveData . $salt . $pepper;
$hash = hash("sha256", $dataToHash);

