<?php

require $_SERVER['DOCUMENT_ROOT'] . "/src/ServiceUser.php";
require $_SERVER['DOCUMENT_ROOT'] . "/src/Config.php";

$name = $_GET["name"] ?? null;

if (empty($name)) {
    die("Necessário envio das informações: name.");
}

$ServiceUser = new ServiceUser();

$result = $ServiceUser->getUserByName($name);

$result = json_encode($result, JSON_PRETTY_PRINT);

echo $result;
