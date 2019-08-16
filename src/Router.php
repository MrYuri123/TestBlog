<?php

namespace src;

use controllers\MainController;

class Router 
{

    protected $controller;
    protected $url;
    protected $getParams;

    public function __construct($request)
    {
        $this->controller = new MainController();

        $parts = parse_url($request);

        $this->url = $parts['path'];

        switch ($this->url) {
            case '/':
                $this->controller->index();
                break;
                
            case '/single-post':
                $this->controller->singlePost($_GET['id']);
                break;
        }
    }

}