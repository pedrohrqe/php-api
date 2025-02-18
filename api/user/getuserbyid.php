<?php

require $_SERVER['DOCUMENT_ROOT'] . "/src/ServiceUser.php";
require $_SERVER['DOCUMENT_ROOT'] . "/src/Config.php";

$id = $_GET["id"] ?? null;

if (!$id) {
    die("Necessário envio das informações: id.");
}

$ServiceUser = new ServiceUser();

$result = $ServiceUser->getUserByID($id);

$result = json_encode($result, JSON_PRETTY_PRINT);

echo $result;
