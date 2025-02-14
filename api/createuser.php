<?php

require $_SERVER['DOCUMENT_ROOT'] . "/src/ServiceUser.php";

$name = $_GET["name"] ?? null;
$phone = $_GET["phone"] ?? null;
$email = $_GET["email"] ?? null;
$zipCode = $_GET["zipcode"] ?? null;

$ServiceUser = new ServiceUser();

$result = $ServiceUser->addUser($name, $phone, $email, $zipCode);

$result = json_encode($result, JSON_PRETTY_PRINT);

echo $result;
