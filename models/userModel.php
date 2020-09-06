<?php

require_once('../setting/dbHandler.php');

class User
{
   private $dbh;
   public $login_id;
   public $display_name;

   public function __construct()
   {
      $this->dbh = DB::getHandle();
   }

   public function createUser($login_id, $display_name, $password)
   {
      // パスワードのハッシュ化
      $hashed_pass = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);

      try {
         $insert_sth = $this->dbh->prepare("INSERT INTO users (login_id, display_name, password) VALUES(:login_id, :display_name, :password)");
         $insert_sth->execute([
            ':login_id' => $login_id,
            ':display_name' => $display_name,
            ':password' => $hashed_pass
         ]);
         return true;
      } catch (\Throwable $th) {
         return false;
      }
   }

   public function userLogin($login_id, $password)
   {

      $select_sth = $this->dbh->prepare("SELECT login_id, display_name, password FROM users WHERE login_id = :login_id");
      $select_sth->execute([':login_id' => $login_id]);

      $row = $select_sth->fetch();

      if (!$row) {
         return false;
      }

      if (!password_verify($password, $row['password'])) {
         return false;
      }

      if (empty($row['password'])) {
         return false;
      }

      $this->login_id = $login_id;
      $this->display_name = $row['display_name'];
      return true;
   }
}
