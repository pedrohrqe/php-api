<?php

require $_SERVER['DOCUMENT_ROOT'] . "/src/DataBase.php";

class ServicePost
{
    public $db;

    public function __construct($db = false)
    {
        if ($db) {
            $this->db = $db;
        } else {
            $this->db = new DataBase();
        }
    }

    public function getPostsByUserID($user_id)
    {
        $q = "SELECT * FROM `posts` WHERE user_id = $user_id";
        $result = $this->db->query($q);
        return $result;
    }

    public function getPostByID($id)
    {
        $q = "SELECT * FROM `posts` WHERE id = $id";
        $result = $this->db->query($q);
        return $result;
    }

    public function createPost($user_id, $title, $content)
    {
        $q = "INSERT INTO `posts` (`user_id`, `title`, `content`) VALUES ($user_id, '$title', '$content');";
        $result = $this->db->query($q);
        return $result;
    }

    public function deletePostByID($id)
    {
        $q = "DELETE FROM posts WHERE `id` = $id";
        $result = $this->db->query($q);
        return $result;
    }

    public function updatePostByID($id, $title = null, $content = null)
    {
        $q = "SELECT * FROM `posts` WHERE id = $id";
        $result = $this->db->query($q);
        $oldTitle = $result[0]["title"];
        $oldContent = $result[0]["content"];

        if (empty($title)) $title = $oldTitle;
        if (empty($content)) $title = $oldContent;

        $q1 = "UPDATE `posts` SET `title` = '$title',`content` = '$content' WHERE `id` = $id";
        $result1 = $this->db->query($q1);
        return $result1;
    }
}
