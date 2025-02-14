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
        $q = "SELECT * FROM users";
        $result = $this->db->query($q);
        return $result;
    }

    public function getUserByID($id)
    {
        $q = "SELECT * FROM users WHERE ID = $id";
        $result = $this->db->query($q);
        return $result;
    }

    public function getUserByName($name)
    {
        $q = "SELECT * FROM users WHERE `NAME` = '$name'";
        $result = $this->db->query($q);
        return $result;
    }

    public function getUserByEmail($email)
    {
        $q = "SELECT * FROM `users` WHERE `EMAIL` = '$email'";
        $result = $this->db->query($q);
        return $result;
    }

    public function getUserIDByName($name)
    {
        $q = "SELECT ID FROM users WHERE `NAME` LIKE '%$name%'";
        $result = $this->db->query($q);
        return $result;
    }

    public function addUser($name, $phone, $email, $zipCode)
    {
        $q = "INSERT INTO users (`NAME`, PHONE, EMAIL, ZIPCODE) VALUES ('$name', $phone, '$email', $zipCode)";
        $result = $this->db->query($q);
        return $result;
    }

    public function updateUserNameByID($id, $name)
    {
        $q = "UPDATE users SET `NAME` = '$name' WHERE ID= $id";
        $result = $this->db->query($q);
        return $result;
    }

    public function updateEmailByID($id, $email)
    {
        $q = "UPDATE users SET `EMAIL` = '$email' WHERE ID= $id";
        $result = $this->db->query($q);
        return $result;
    }

    public function updatePhoneByID($id, $phone)
    {
        $q = "UPDATE users SET `PHONE` = '$phone' WHERE ID= $id";
        $result = $this->db->query($q);
        return $result;
    }
}
