<?php

namespace models;

class Post extends Model
{

    public $db;

    public function __construct()
    {
        parent::__construct();
    }

    public function save()
    {
        $sql = 'INSERT INTO posts (author, text, datetime) VALUES (:author, :text, :datetime)';

        $stmt = $this->db->pdo->prepare($sql);

        $stmt->bindParam(':author', $_POST['author']);
        $stmt->bindParam(':text', $_POST['text']);
        $stmt->bindParam(':datetime', time());
            
        if ($stmt->execute()) {
            header('Location: /view/posts/success.php');
        } else {
            header('Location: /view/error.php');
        }
    }

    public function findAll()
    {
        $sql = 'SELECT * FROM posts ORDER BY datetime DESC';

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }

    public function findPost($id)
    {
        $sql = 'SELECT * FROM posts WHERE id='.$id;

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetch();

        return $result;
    }
}