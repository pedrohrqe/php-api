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

    private function executeQuery($query)
    {
        $result = $this->db->query($query);
        return $result;
    }

    public function getAllUsers()
    {
        return $this->executeQuery("SELECT * FROM users");
    }

    public function getUserByID($id)
    {
        return $this->executeQuery("SELECT * FROM users WHERE ID = $id");
    }

    public function getUserByName($name)
    {
        return $this->executeQuery("SELECT * FROM users WHERE `NAME` = '$name'");
    }

    public function getUserByEmail($email)
    {
        return $this->executeQuery("SELECT * FROM `users` WHERE `email` = '$email'");
    }

    public function createUser($name, $phone, $email, $zipCode)
    {
        return $this->executeQuery("INSERT INTO users (`NAME`, PHONE, EMAIL, ZIPCODE) VALUES ('$name', $phone, '$email', $zipCode)");
    }

    public function deleteUser($id)
    {
        return $this->executeQuery("DELETE FROM `users` WHERE `id` = $id");
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

        return $this->executeQuery("UPDATE `users` SET " . implode(", ", $setValues) . " WHERE `id` = $id;");
    }
}
