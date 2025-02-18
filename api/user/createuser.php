<?php

require $_SERVER['DOCUMENT_ROOT'] . "/src/ServiceUser.php";

$name = $_GET["name"] ?? null;
$phone = $_GET["phone"] ?? null;
$email = $_GET["email"] ?? null;
$zipCode = $_GET["zipcode"] ?? null;

if (empty($name) || empty($phone) || empty($email) || empty($zipCode)) {
    die("Necessário envio das informações: name, phone, email, zipcode.");
}

$ServiceUser = new ServiceUser();

$result = $ServiceUser->createUser($name, $phone, $email, $zipCode);

$result["user"] = [
    "id" => $result["id"],
    "name" => $name,
    "phone" => $phone,
    "email" => $email,
    "zipcode" => $zipCode
];

$result = json_encode($result, JSON_PRETTY_PRINT);

echo $result;
