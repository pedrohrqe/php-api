<?php

require $_SERVER['DOCUMENT_ROOT'] . "/src/ServicePosts.php";

$userID = intval($_GET['userid']) ?? null;
$title = $_GET['title'] ?? null;
$content = $_GET['content'] ?? null;

if (empty($userID) || empty($title) || empty($content)) {
    throw new Exception("Necessário envio das informações: userid, title, content.");
}

$ServicePosts = new ServicePost();
$result  = $ServicePosts->createPost($userID, $title, $content);

if (!empty($result["id"])){
    $result["post"] = [
        "id" => $result["id"],
        "title" => $title,
        "content" => $content
    ];
}

echo json_encode($result, JSON_PRETTY_PRINT);