<?php

namespace App\Models;

use App\Config\Database;
use PDO;

class Article
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function create($title, $content, $user_id)
    {
        $stmt = $this->db->prepare("INSERT INTO articles (title, content, user_id) VALUES (?, ?, ?)");
        $stmt->execute([$title, $content, $user_id]);
    }

    public function all()
    {
        $stmt = $this->db->query("SELECT a.*, u.username FROM articles a JOIN users u ON a.user_id = u.id ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("SELECT a.*, u.username FROM articles a JOIN users u ON a.user_id = u.id WHERE a.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $title, $content)
    {
        $stmt = $this->db->prepare("UPDATE articles SET title = ?, content = ? WHERE id = ?");
        $stmt->execute([$title, $content, $id]);
    }

    public function search($term)
    {
        $sql = "SELECT a.*, u.username FROM articles a 
            JOIN users u ON a.user_id = u.id 
            WHERE a.title LIKE '%$term%' OR a.content LIKE '%$term%' 
            ORDER BY created_at DESC";

        try {
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            if (isset($_GET['debug']) && $_GET['debug'] == '1') {
                echo "<pre style='color: red; font-weight: bold'>" . $e->getMessage() . "</pre>";
            }
            return [];
        }
    }


}
