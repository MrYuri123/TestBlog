<?php

class DB
{

    const DB_HOST = 'localhost';
    const DB_NAME = 'blog';
    const DB_USER = 'root';
    const DB_PASS = '';

	public $pdo;

	public function __construct () {

        try {
			$this->pdo = new \PDO(
				'mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME,
		    	self::DB_USER,
		    	self::DB_PASS
		    );
		} catch (\PDOException $e) {
		    print "Error!: " . $e->getMessage() . "<br/>";
		    die();
		}
	}
}