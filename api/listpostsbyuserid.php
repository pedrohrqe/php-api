<?php

require $_SERVER['DOCUMENT_ROOT'] . "/src/ServicePosts.php";

$userid = $_GET['userid'] ?? null;

$ServicePosts = new ServicePost();
$result  = $ServicePosts->getPostsByUserID($userid);
echo json_encode($result, JSON_PRETTY_PRINT);