<?php
session_start();
include "db_connect.php";



// 投稿取得
$sql = "SELECT * FROM poststb ORDER BY id DESC";
$stmt = $pdo->query($sql);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);//データベースから該当した条件のデータを1件だけ取ってくる


?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>投稿一覧</title>
<link rel="stylesheet" href="m6.css">
</head>
<body>
<h1>Speak Ready ~英語フレーズ共有アプリ～ </h1>
<h2>投稿一覧</h2>

<!-- ログイン状態で表示切り替え -->
<?php if(isset($_SESSION["username"])): ?>
    <p>ようこそ <?php echo htmlspecialchars($_SESSION["username"]); ?> さん</p>
    <a href="logout.php">ログアウト</a>
     <a href="post.php">新規投稿</a>
<?php else: ?>
    <a href="login.php">ログイン</a>
    <a href="register.php">新規登録</a>
    <a href="post.php">新規投稿</a>
<?php endif; ?>

<br><br>



<hr>

<!-- 投稿一覧 -->
<?php foreach($posts as $post): ?>

<div style="border:1px solid #ccc; margin:10px; padding:10px;">

<p>投稿者: <?php echo htmlspecialchars($post["username"]); ?></p> <!-- htmlspecialchars:<, >, " などの文字がHTMLで安全に表示される形に変換-->

<p>シーン: <?php echo htmlspecialchars($post["situation"]); ?></p>

<p>フレーズ: <?php echo htmlspecialchars($post["phrase"]); ?></p>

<p>日本語訳: <?php echo htmlspecialchars($post["translation"]); ?></p>

<p>投稿日時: <?php echo $post["datetime"]; ?></p>

</div>

<?php endforeach; ?>



</body>
</html>
