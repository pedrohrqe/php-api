<?php

require $_SERVER['DOCUMENT_ROOT'] . "/src/ServiceUser.php";

$ServiceUser = new ServiceUser();

$result = $ServiceUser->getAllUsers();

$result = json_encode($result, JSON_PRETTY_PRINT);

echo $result;
