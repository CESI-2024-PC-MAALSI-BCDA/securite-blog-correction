<?php

namespace App\Models;

use App\config\Database;
use PDO;
use PDOException;

class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function create($username, $password): void
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

    public function delete($id): void
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function createWithRole(string $username, string $password, string $role = 'user'): bool
    {
        try {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare(
                "INSERT INTO users (username, password, role) VALUES (:u, :p, :r)"
            );
            return $stmt->execute([
                'u' => $username,
                'p' => $hashed,
                'r' => $role
            ]);
        } catch (PDOException $e) {

            if ($e->getCode() === '23000') {
                return false;
            }
            error_log("User::createWithRole error [{$e->getCode()}]: {$e->getMessage()}");
            return false;
        }
    }
}
