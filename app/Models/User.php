<?php

namespace App\Models;

use App\config\Database;
use PDO;

class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function create($username, $password)
    {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $hashed]);
    }

    public function login($username, $password)
    {
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = $this->db->query($query);
        $user = $result->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    public function all(): array
    {
        $stmt = $this->db->query("SELECT id, username, role FROM users ORDER BY id");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
    }
}
