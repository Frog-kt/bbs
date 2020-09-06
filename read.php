<?php
session_start();

require_once('./models/bbsModel.php');

$BBS = new BBS();
$rows = $BBS->readPostsFromDB();

?>

<!DOCTYPE html>

<head>
   <title>掲示板</title>
</head>

<body>
   <h1>掲示板</h1>
   <?php if (!empty($_SESSION['user_id'])) : ?>
      <form method="POST" action="./controllers/write.php" style="margin: 2em;">
         <div>
            名前: <?= htmlspecialchars($_SESSION['display_name']) ?>
         </div>
         <div>
            <textarea name="body" rows="5" cols="100" required></textarea>
         </div>
         <button type="submit">投稿</button>
      </form>
   <?php else : ?>
      投稿するには<a href="./login.php">ログイン</a>してください。
   <?php endif; ?>
   <hr>
   <?php foreach ($rows as $row) : ?>
      <div style="margin: 2em;">
         <span><?= htmlspecialchars($row['display_name']) ?>さんの投稿</span>
         <span>(投稿日: <?= $row['created_at'] ?>)</span>
         <div style="margin-top: 0.5em;"><?= nl2br(htmlspecialchars($row['body'])) ?></div>
      </div>
      <hr>
   <?php endforeach; ?>

</body>