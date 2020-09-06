<?php
session_start();

require_once('../models/userModel.php');

$User = new User();

if (empty($_POST['login_id']) || empty($_POST['password'])) {
   header("HTTP/1.1 302 Found");
   header("Location: ../login.php");
   return;
}

if ($User->userLogin($_POST['login_id'], $_POST['password'])) {
   session_regenerate_id(true);

   $_SESSION['user_id'] = $User->login_id;
   $_SESSION['display_name'] = $User->display_name;

   header("HTTP/1.1 302 Found");
   header("Location: ../read.php");
   return;
} else {
   print('パスワードが間違っています。<a href="../login.php">戻る</a>');
   @header("HTTP/1.1 302 Found");
   @header("Location: ../login.php");
   return;
}
