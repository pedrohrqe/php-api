<?php

require $_SERVER['DOCUMENT_ROOT'] . "/src/ServicePosts.php";
require $_SERVER['DOCUMENT_ROOT'] . "/src/Config.php";

$userid = $_GET['userid'] ?? null;

if (empty($userid)) {
    die("Necessário envio das informações: userid.");  
}

$ServicePosts = new ServicePost();
$result  = $ServicePosts->getPostsByUserID($userid);
echo json_encode($result, JSON_PRETTY_PRINT);