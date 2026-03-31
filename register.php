<?php 
session_start();
include "create_tables.php";

$error="";

if(isset($_POST["submit"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    if(empty($username)&&empty($password)){
        $error= "ユーザー名とパスワードを入力してください";

    }elseif(empty($username)){
        $error= "ユーザー名を入力してください";

    }elseif(empty($password)){
        $error= "パスワードを入力してください";

    }else{
        $sql="INSERT INTO userstb (username, password) VALUES(:username,:password)";
        $stmt=$pdo->prepare($sql);

        $stmt->bindValue(":username",$username,PDO::PARAM_STR);
        $stmt->bindValue(":password",$password,PDO::PARAM_STR);

        if($stmt->execute()){
            header("Location: login.php");
            exit;
        }else{
            $error="登録に失敗しました";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー登録</title>
    <link rel="stylesheet" href="m6.css">
</head>

    <h1>Speak Ready ~英語フレーズ共有アプリ～ </h1>
    <P><a href="index.php">フレーズ一覧</a></P>

<body>


<div class="register">
<h2>ユーザー登録</h2></br>

<!-- エラー表示 -->
<?php if($error): ?>
<p style="color:red;"><?php echo $error;?></p>
<?php endif;?>

<form action="" method="post">
    <input type="text" name="username" placeholder="ユーザー名">
    <br/>
    <input type="password" name="password" placeholder="パスワード">
    <br/>
    <button type="submit" name="submit">登録</button>
</form>

<p><a href="login.php">ログインはこちら</a></p>
</div>
</body>
</html>







