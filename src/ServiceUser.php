<?php

require $_SERVER['DOCUMENT_ROOT'] . "/src/DataBase.php";

class ServiceUser
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

    public function getAllUsers()
    {
        return $this->db->query("SELECT * FROM users");
    }

    public function getUserByID($id)
    {
        return $this->db->query("SELECT * FROM users WHERE ID = $id");
    }

    public function getUserByName($name)
    {
        return $this->db->query("SELECT * FROM users WHERE `NAME` = '$name'");
    }

    public function getUserByEmail($email)
    {
        return $this->db->query("SELECT * FROM `users` WHERE `email` = '$email'");
    }

    public function createUser($name, $phone, $email, $zipCode)
    {
        return $this->db->query("INSERT INTO users (`NAME`, PHONE, EMAIL, ZIPCODE) VALUES ('$name', $phone, '$email', $zipCode)");
    }

    public function deleteUser($id)
    {
        return $this->db->query("DELETE FROM `users` WHERE `id` = $id");
    }

    public function updateUser($id, $name = "", $phone = "", $email = "", $zipCode = "")
    {
        if (empty($name) && empty($phone) && empty($email) && empty($zipCode)) {
        }

        $keys = [];

        if (!empty($name)) {
            $keys["`name`"] = $name;
        }
        if (!empty($phone)) {
            $keys["`phone`"] = $phone;
        }
        if (!empty($email)) {
            $keys["`email`"] = $email;
        }
        if (!empty($zipcode)) {
            $keys["`zipcode`"] = $zipcode;
        }

        if (empty($keys)) {
            throw new Exception("Necessário envio de uma das informações: name, phone, email, zipcode.");
        };

        $setValues = [];
        foreach ($keys as $key => $value) {
            $setValues[] = "$key = '$value'";
        }

        return $this->db->query("UPDATE `users` SET " . implode(", ", $setValues) . " WHERE `id` = $id;");
    }
}
