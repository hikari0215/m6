<?php 

//このミッションは実行しないこと！

// DB 接続設定
$dsn="mysql:dbname=tb270883db;host=localhost";
$user="tb-270883";
$password="fnmzfyUR5Z";
$pdo=new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

// 4-1 で書いた 「// DB 接続設定」 のコードの下に続けて記載する。
// 【！この SQL は tbtest テーブルを削除します！】


$sql="DROP TABLE userstb";
$stmt=$pdo->query($sql);

$sql="DROP TABLE poststb";
$stmt=$pdo->query($sql);


?>