<?php

namespace controllers;

use models\Post;
use models\Comment;
use widgets\TopPosts;

class MainController
{
    protected $post;
    protected $comment;

    public function __construct()
    {
        $this->post    = new Post();
        $this->comment = new Comment();
    }

    public function index()
    {

        if (isset($_POST) && !empty($_POST)){
            //TODO: Add validation;
            $this->post->save();         
        }

        $posts = $this->post->findAll();

        $widget = new TopPosts(5, $this->post);

        include_once 'view/posts/index.php';
    }

    public function singlePost($id)
    {

        if (isset($_POST) && !empty($_POST)){
            //TODO: Add validation;
            $this->comment->save($id);         
        }

        $post     = $this->post->findPost($id); 
        $comments = $this->comment->getPostsComments($id); 

        $this->comment->countComments(5);

        include_once 'view/single/index.php';
    }
}