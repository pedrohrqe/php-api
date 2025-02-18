<?php

require $_SERVER['DOCUMENT_ROOT'] . "/src/ServiceUser.php";

$id = $_GET["id"] ?? null;

if (empty($id)) {
    die("Necessário envio das informações: id.");
}

$ServiceUser = new ServiceUser();
$result = $ServiceUser->deleteUser($id);

echo json_encode($result, JSON_PRETTY_PRINT);
