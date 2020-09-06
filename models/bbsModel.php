<?php

require_once('./setting/dbHandler.php');

// DBハンドラ
$db_handler = DB::getHandle();

class BBS
{
   private $dbh;

   public function __construct()
   {
      $this->dbh = DB::getHandle();
   }

   public function writePostToDB($user_id, $display_name, $body)
   {
      try {
         $insert_sth = $this->dbh->prepare('INSERT INTO bbs_entries (user_id, display_name, body) VALUES (:user_id, :display_name, :body)');
         $insert_sth->execute([
            ':user_id' => $user_id,
            ':display_name' => $display_name,
            ':body' => $body
         ]);
         return true;
      } catch (\Throwable $th) {
         return false;
      }
   }

   public function readPostsFromDB()
   {
      $select_sth = $this->dbh->prepare('SELECT display_name, body, created_at FROM bbs_entries ORDER BY id DESC');
      $select_sth->execute();
      $rows = $select_sth->fetchAll();
      return $rows;
   }
}
