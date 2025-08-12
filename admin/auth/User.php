<?php

class User
{

    public $id = '';
    public $username = '';
    public $password = '';
    public $role = '';
    public $name = '';
    public $email = '';

    private $db = '';

    public function __construct($user = null)
    {
        if ($user === null) {
            return $this;
        }

        $this->username = $user['username'];
        $this->password = password_hash($user['password'], PASSWORD_DEFAULT);
        $this->role = $user['role'];
        $this->name = $user['name'];
        $this->email = $user['email'];

        $this->db = Database::getInstance();
        return $this;
    }

    public function save()
    {
        $username = $this->username;
        $password = $this->password;
        $role = $this->role;
        $name = $this->name;
        $email = $this->email;

        $sql = "SELECT username FROM users WHERE username = '$this->username'";

        if ($this->db->query($sql)->num_rows > 0) {
            throw new Exception('username already exits');
        }

        $sql = "INSERT INTO users (`username`, `password`, `role`, `name`, `email`)
            VALUES ('$username', '$password', '$role', '$name', '$email')";

        if ($this->db->query($sql) === false) {
            throw new Exception($this->db->error);
        }
        return $this->findByUsername($this->username);
    }

    public function find($id)
    {
        if (!$id) {
            return false;
        }

        $sql = "SELECT * FROM users WHERE id = '$id'";
        $res = $this->db->query($sql);

        if ($res->num_rows < 1) {
            return false;
        }

        $user = $res->fetch_object();

        return $user;
    }

    public function findByUsername($username)
    {

        if (!$username) {
            return false;
        }

        $sql = "SELECT * FROM users WHERE username = '$username'";
        //echo $sql;die;
        $res = $this->db->query($sql);

        if ($res->num_rows < 1) {
            return false;
        }

        $user = $res->fetch_object();

        return $user;
    }

    public function update($user)
    {
        foreach ($user as $key => $value) {
            $this->{$user[$key]} = $value;
        }

        $id = $this->id;
        $username = $this->username;
        $password = $this->password;
        $role = $this->role;
        $name = $this->name;
        $email = $this->email;

        $sql = "UPDATE users SET
            `username` = '$username',
            `password` = '$password',
            `role` = '$role',
            `name` = '$name',
            `email` = '$email',
            WHERE id = '$id'";

        return $this->db->query($sql);
    }

    public function delete($id)
    {

        if (!$id) {
            return false;
        }

        $user = $this->find($id);

        if (!$user) {
            return false;
        }

        $sql = "DELETE FROM users WHERE id = '$id'";

        if ($this->db->query($sql) === false) {
            return false;
        }

        return $user;
    }
}