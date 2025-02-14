<?php

require $_SERVER['DOCUMENT_ROOT'] . "/src/ServicePosts.php";

$id = $_GET['id'] ?? null;
$title = $_GET['title'] ?? null;
$content = $_GET['content'] ?? null;

$ServicePosts = new ServicePost();
$result  = $ServicePosts->updatePostByID($id, $title, $content);
echo json_encode($result, JSON_PRETTY_PRINT);