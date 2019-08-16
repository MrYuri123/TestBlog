<?php
//Add autoload to classes
function autoload_func($className) {
      if (file_exists($className . '.php')) {
          require_once $className . '.php';
          return true;
      }
      return false;
}
spl_autoload_register('autoload_func');

use src\Router;

$router = new Router($_SERVER['REQUEST_URI']);

// Сделать виджет 5 самых популярных