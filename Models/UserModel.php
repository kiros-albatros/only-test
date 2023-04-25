<?php

class UserModel
{
    private Db $db;

    public function __construct()
    {
        $this->db = new Db;
    }

    public function findUserById($id)
    {
        return $this->db->getById($id, 'Users');
    }

    public function findUserByName($name)
    {
        $this->db->query('SELECT * FROM `Users` WHERE name = :name');
        $this->db->bind(':name', $name);
        return $this->db->single();
    }

    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM `Users` WHERE email = :email');
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    public function findUserByTelephone($telephone)
    {
        $this->db->query('SELECT * FROM `Users` WHERE telephone = :telephone');
        $this->db->bind(':telephone', $telephone);
        return $this->db->single();
    }

    public function addUser($data)
    {
        $this->db->query('INSERT INTO `Users` (name, email, telephone, password) VALUES (:name, :email, :telephone, :password)');
        $this->db->bind(":name", $data['name']);
        $this->db->bind(":email", $data['email']);
        $this->db->bind(":telephone", $data['telephone']);
        $this->db->bind(":password", $data['password']);
        $this->db->execute();
    }

    public function updateUser($id, $data)
    {
        $user = $this->db->getById($id, 'Users');
        if ($user) {
            $this->db->query('UPDATE Users SET name = :name, email = :email, telephone = :telephone, password = :password WHERE id = :id');
            $this->db->bind(':id', $id);
            $this->db->bind(":name", $data['name']);
            $this->db->bind(":email", $data['email']);
            $this->db->bind(":telephone", $data['telephone']);
            $this->db->bind(":password", $data['password']);
            $this->db->execute();
        }
    }
}