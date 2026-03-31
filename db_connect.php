<?php

$dsn="mysql:dbname=データベース名;host=localhost";
$user="ユーザー名";
$password="パスワード";


try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo "DB接続エラー: " . $e->getMessage();
    exit;    //プログラムを完全に止める
}

?>