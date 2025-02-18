<?php

require $_SERVER['DOCUMENT_ROOT'] . "/src/ServicePosts.php";

$id = $_GET['id'] ?? null;

$ServicePosts = new ServicePost();
$result  = $ServicePosts->deletePostByID($id);

echo json_encode($result, JSON_PRETTY_PRINT);