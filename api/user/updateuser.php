<?php

require $_SERVER['DOCUMENT_ROOT'] . "/src/ServiceUser.php";
require $_SERVER['DOCUMENT_ROOT'] . "/src/Config.php";

$id = $_GET["id"] ?? null;
$name = $_GET["name"] ?? null;
$phone = $_GET["phone"] ?? null;
$email = $_GET["email"] ?? null;
$zipCode = $_GET["zipcode"] ?? null;

if (empty($name) && empty($phone) && empty($email) && empty($zipCode)) {
    throw new Exception("Necessário envio de uma das informações: name, phone, email, zipcode.");
}

$ServiceUser = new ServiceUser();

$result = $ServiceUser->updateUser($id, $name, $phone, $email, $zipCode);

$result["user"] = [
    "id" => $id,
    "name" => $name == null ? "hidden" : $name,
    "phone" => $phone == null ? "hidden" : $phone,
    "email" => $email == null ? "hidden" : $email,
    "zipcode" => $zipCode == null ? "hidden" : $zipCode
];

$result = json_encode($result, JSON_PRETTY_PRINT);

echo $result;
