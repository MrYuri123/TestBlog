<?php 

namespace models;

class Comment extends Model
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
    }

    public function save()
    {

        $sql = 'INSERT INTO comments (author, text, post_id, datetime) VALUES (:author, :text, :post_id, :datetime)';

        $stmt = $this->db->pdo->prepare($sql);


        //TODO: update GET data validation;
        $post_id = trim($_GET['id']);
        $post_id = htmlspecialchars($post_id);

        $stmt->bindParam(':author', $_POST['author']);
        $stmt->bindParam(':text', $_POST['text']);
        $stmt->bindParam(':post_id', $post_id);
        $stmt->bindParam(':datetime', time());
            
        if ($stmt->execute()) {
            header('Location: /view/posts/success.php');
        } else {
            header('Location: /view/error.php');
        }
    }

    public function getPostsComments($post_id)
    {
        $sql = 'SELECT * FROM comments WHERE post_id='.$post_id.' ORDER BY datetime DESC';

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }

    public function countComments($post_id)
    {
        $sql = 'SELECT COUNT(*) FROM `comments` WHERE post_id = ' . $post_id;

        $stmt = $this->db->pdo->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetch()[0];

        return $result;
    }
}
