<?php

 class DB{

   private $host;
   private $user;
   private $senha;
   private $bd;

   public $pdo;

   private static $instance = null;
   
    private function __construct(){

      $this->host   = 'localhost';
      $this->user   = 'root';
      $this->senha  = 'Sk8long2077#';
      $this->bd     = 'curso_mp';

      $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->bd", $this->user, $this->senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8MB4"));

  }

  public static function getInstance(){
      if (self::$instance === null) {
          self::$instance = new self();
      }
      return self::$instance->pdo;
  }

 }

 ?>
