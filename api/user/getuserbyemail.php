<?php

require $_SERVER['DOCUMENT_ROOT'] . "/src/ServiceUser.php";

$email = $_GET["email"] ?? null;

if (!$email) {
    die("Necessário envio das informações: email.");
}

$ServiceUser = new ServiceUser();

$result = $ServiceUser->getUserByEmail($email);

$result = json_encode($result, JSON_PRETTY_PRINT);

echo $result;
