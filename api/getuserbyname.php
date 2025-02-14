<?php

require $_SERVER['DOCUMENT_ROOT'] . "/src/ServiceUser.php";

$name = $_GET["name"] ?? null;

$ServiceUser = new ServiceUser();

$result = $ServiceUser->getUserByName($name);

$result = json_encode($result, JSON_PRETTY_PRINT);

echo $result;
