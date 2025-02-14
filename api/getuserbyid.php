<?php

require $_SERVER['DOCUMENT_ROOT'] . "/src/ServiceUser.php";

$id = $_GET["id"] ?? null;

if (!$id || !is_numeric($id)) {
    die(json_encode(["error" => "ID não encontrado ou inválido"], JSON_PRETTY_PRINT));
}

$ServiceUser = new ServiceUser();

$result = $ServiceUser->getUserByID($id);

$result = json_encode($result, JSON_PRETTY_PRINT);

echo $result;
