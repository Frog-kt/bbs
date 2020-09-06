<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <title>ログイン</title>
</head>

<body>
   <h1>ログイン</h1>
   <form method="POST" action="./controllers/userLogin.php" style="margin: 2em;">
      <div>
         ログインID: <input type="text" name="login_id">
      </div>
      <div>
         パスワード: <input type="password" name="password">
      </div>
      <button type="submit">決定</button>
   </form>
   <hr>
   <a href="./register.php">会員登録がまだのひとはこちらから会員登録してください。</a>
</body>

</html>

