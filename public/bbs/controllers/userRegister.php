<?php

session_start();

require_once('../models/userModel.php');

$User = new User();

if (empty($_POST['login_id']) || empty($_POST['password'])) {
   header("HTTP/1.1 302 Found");
   header("Location: ./login.php");
   return;
}

$has_created = $User->createUser(
   $_POST['login_id'],
   $_POST['display_name'],
   $_POST['password']
);

if ($has_created) {
   header("HTTP/1.1 302 Found");
   header("Location: ../register_finish.php");
   return;
} else {
   header("HTTP/1.1 302 Found");
   header("Location: ../register.php");
   return;
}
