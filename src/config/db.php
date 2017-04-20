<?php
  class db{
      //Properties
      private $dbhost = 'localhost';
      private $dbuser = 'root';
      private $dbpass = '';
      private $dbname = 'devapp';

      //Connect (needed for PDO)
      public function connect(){
          $mysql_connect_str = "mysql:host=$this->dbhost";
          

      }
  }