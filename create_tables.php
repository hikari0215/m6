<?php 
// DB 接続設定
$dsn="mysql:dbname=データベース名;host=localhost";
$user="ユーザー名";
$password="パスワード";
$pdo=new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

//ユーザー登録機能テーブルを作成
$sql="CREATE TABLE IF NOT EXISTS userstb"
     ."("
     ."id INT AUTO_INCREMENT PRIMARY KEY,"
     ."username VARCHAR(32),"
     ."password VARCHAR(255) NOT NULL"
     .");";
     
     
$stmt=$pdo->query($sql);    

//投稿用テーブルを作成
$sql="CREATE TABLE IF NOT EXISTS poststb"
     ."("
     ."id INT AUTO_INCREMENT PRIMARY KEY,"
     ."user_id INT,"
     ."username TEXT,"
     ."situation TEXT,"
     ."phrase TEXT,"
     ."translation TEXT,"
     ."datetime DATETIME DEFAULT CURRENT_TIMESTAMP"
     .");";
     
     
$stmt=$pdo->query($sql); 
     

?>