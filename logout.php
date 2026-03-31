<?php 
session_start();

//セッション削除
session_unset();
session_destroy();

//ログインページへ
header("Location: login.php");
exit;

?>