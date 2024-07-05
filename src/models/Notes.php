<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Notes
{
    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAllNotes()
    {
        $stmt = $this->db->prepare("SELECT n.id, n.title, n.content, DATE_FORMAT(n.created_at, '%d-%m-%Y') as created_at, u.username 
        FROM notes n Join users u on n.creator_id = u.id");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllTitles() {
        $stmt = $this->db->prepare("SELECT id, title FROM notes");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($params) {

        $id = explode("/", $params)[2];
        $stmt = $this->db->prepare("SELECT n.id, n.title, n.content, DATE_FORMAT(n.created_at, '%d-%m-%Y') as created_at, u.username 
                                    FROM notes n Join users u on n.creator_id = u.id WHERE n.id = ". $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function save($title, $content, $creatorId){
        
        $stmt = $this->db->prepare("INSERT INTO notes (title, content, creator_id) VALUES (:title, :content, :creatorId)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':creatorId', $creatorId);
        
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }
}
