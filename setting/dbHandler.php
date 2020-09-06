<?php

class DB
{
   private static $dbh;

   private function __construct()
   {
   }

   public static function getHandle()
   {
      $db_type = 'mysql';
      $db_host = 'localhost';
      $db_name = '2020techc_db';
      $db_user = '2020techc_username';
      $db_pass = '2020techc_password';

      $dbh = new PDO("$db_type:hots=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass);

      return $dbh;
   }

   final function __close()
   {
      throw new \Exception('Clone is not allowed against' . get_class($this));
   }
}
