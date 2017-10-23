<?php
/**
* @pattern: Singleton Design Pattern
 */
class Connection
{

  private $connection;
  public static $instance;
  private $dbhost = 'project-db-host';
  private $dbname = 'project-db-name';
  private $dbuser  = 'project-db-user';
  private $dbpass  = 'project-db-pass';

  private function __construct()
  {
    try {
	  $this->connection = new PDO('mysql:host='.$this->dbhost.';dbname='.$this->dbname, $this->dbuser, $this->dbpass);
	} catch ( PDOException $e ){
	  print $e->getMessage();
	}
  }

  public static function getInstance()
  {
    // instance tanımlı mı bakalım, değilse oluşturalım
    if(!self::$instance) {
        self::$instance = new self();
    }
    return self::$instance;
  }

  // dışarıdan kopyalanmasını engelledik
  private function __clone() { }

  // unserialize edilmesini engelledik
  private function __wakeup() { }

  // PDO bağlantısını döndürelim
  public function getConnection()
  {
      return $this->connection;
  }

}
