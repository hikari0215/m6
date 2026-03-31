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
        $sql="SELECT * FROM userstb WHERE username=:username";
        $stmt=$pdo->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        
        if($row && $row["password"] === $password){

            $_SESSION["user_id"]=$row["id"];
            $_SESSION["username"]=$row["username"];

            header("Location: index.php");
            exit;

        }else{
            $error="ログインに失敗しました";
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
<body>
<h1>Speak Ready ~英語フレーズ共有アプリ～ </h1>
<p><a href="index.php">フレーズ一覧</a></p>
<div class="login">
<h2>ログイン</h2>

<!-- エラー表示 -->
<?php if($error): ?>
<p style="color:red;"><?php echo $error;?></p>
<?php endif;?>

<form action="" method="post">
    <input type="text" name="username" placeholder="ユーザー名">
    <br/>
    <input type="password" name="password" placeholder="パスワード">
    <br/>
    <button type="submit" name="submit">ログイン</button>
</form>

<p><a href="register.php">新規登録はこちら</a></p>
</div>
</body>
</html>







