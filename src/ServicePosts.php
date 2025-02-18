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

    private function executeQuery($query)
    {
        $result = $this->db->query($query);
        return $result;
    }

    public function getPostsByUserID($user_id)
    {
        return $this->executeQuery("SELECT * FROM `posts` WHERE user_id = $user_id");
    }

    public function getPostByID($id)
    {
        return $this->executeQuery("SELECT * FROM `posts` WHERE id = $id");
    }

    public function createPost($user_id, $title, $content)
    {
        return $this->executeQuery("INSERT INTO `posts` (`user_id`, `title`, `content`) VALUES ($user_id, '$title', '$content');");
    }

    public function deletePostByID($id)
    {
        return $this->executeQuery("DELETE FROM posts WHERE `id` = $id");
    }

    public function updatePostByID($id, $title = null, $content = null)
    {
        $q = "SELECT * FROM `posts` WHERE id = $id";
        $result = $this->db->query($q);
        $oldTitle = $result["result"][0]["title"];
        $oldContent = $result["result"][0]["content"];

        if (empty($title) || empty($content)) {
            throw new Exception("Título e conteúdo em branco", 1);
        }

        if ($title == $oldTitle && $content == $oldContent) {
            throw new Exception("Título e conteúdo iguais ao já salvo!");
        }

        if (empty($title)) $title = $oldTitle;
        else if (empty($content)) $title = $oldContent;

        $q1 = "UPDATE `posts` SET `title` = '$title',`content` = '$content' WHERE `id` = $id";
        $result1 = $this->db->query($q1);

        if ($result1["affected_rows"] > 0) {
            $result1["id"] = $id;
            $result1["post"] = [
                "id" => $id,
                "title" => $title,
                "content" => $content
            ];
        }
        return $result1;
    }
}
