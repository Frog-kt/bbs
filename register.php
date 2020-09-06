<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>会員登録</title>
</head>

<body>
   <h1>会員登録</h1>

   <form method="POST" action="./controllers/userRegister.php" style="margin: 2em;">
      <input type="hidden" name="type" value="regist_user">
      <div>
         ログインID: <input type="text" name="login_id">
      </div>
      <div>
         表示名: <input type="text" name="display_name">
      </div>
      <div>
         パスワード: <input type="password" name="password">
      </div>
      <button type="submit">決定</button>
   </form>
</body>