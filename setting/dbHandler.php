<?php

class DB
{
   private static $dbh;

   private function __construct()
   {
   }

   public static function getHandle()
   {
      $db_user = '2020techc_username';
      $db_pass = '2020techc_password';

      $dbh = new PDO('mysql:host=mysql;dbname=2020techc_db', $db_user, $db_pass);

      return $dbh;
   }

   final function __close()
   {
      throw new \Exception('Clone is not allowed against' . get_class($this));
   }
}
