<?php

session_start();

require_once('../models/bbsModel.php');

if (empty($_SESSION['user_id']) || empty($_SESSION['display_name'])) {
   header("HTTP/1.1 302 Found");
   header("Location: ../login.php");
   return;
}

$BBS = new BBS();
$BBS->writePostToDB($_SESSION['user_id'], $_SESSION['display_name'], $_POST['body']);

header("HTTP/1.1 302 Found");
header("Location: ../read.php");
return;
