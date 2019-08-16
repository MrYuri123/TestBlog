<?php

namespace widgets;

use models\Post;

class TopPosts
{
    private $limit;
    private $model;

    public function __construct($limit, Post $model)
    {
        $this->limit = $limit;
        $this->model = $model;
    }

    protected function getTopPosts()
    {
        $sql = 'SELECT `posts`.*, count(`comments`.`id`) 
                FROM `posts` 
                LEFT JOIN `comments` 
                ON `posts`.`id` = `comments`.`post_id` 
                GROUP BY `posts`.`id` 
                ORDER BY count(`comments`.`id`) 
                DESC LIMIT '.$this->limit;

        $stmt = $this->model->db->pdo->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll();

        return $result;
    }

    public function run()
    {
        $topPosts = $this->getTopPosts();

        include_once '/widgets/view/top/index.php';
    }
}