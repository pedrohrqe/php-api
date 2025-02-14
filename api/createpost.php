<?php

require $_SERVER['DOCUMENT_ROOT'] . "/src/ServicePosts.php";

$userID = $_GET['userid'] ?? null;
$title = $_GET['title'] ?? null;
$content = $_GET['content'] ?? null;

$ServicePosts = new ServicePost();
$result  = $ServicePosts->createPost($userID, $title, $content);
echo json_encode($result, JSON_PRETTY_PRINT);