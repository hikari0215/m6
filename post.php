<?php 
session_start();
include "create_tables.php";

// ログインチェック
if(!isset($_SESSION["user_id"])){
    header("Location: login.php");
    exit;
}

$error = "";

if(isset($_POST["submit"])){

    $user_id = $_SESSION["user_id"];
    $username = $_SESSION["username"];
    $situation = $_POST["situation"];
    $phrase = $_POST["phrase"];
    $translation = $_POST["translation"];

    //  全パターン分岐
    if(empty($situation) && empty($phrase) && empty($translation)){
        $error = "すべて入力してください";

    }elseif(empty($situation) && empty($phrase)){
        $error = "シーンと英語フレーズを入力してください";

    }elseif(empty($situation) && empty($translation)){
        $error = "シーンと日本語訳を入力してください";

    }elseif(empty($phrase) && empty($translation)){
        $error = "英語フレーズと日本語訳を入力してください";

    }elseif(empty($situation)){
        $error = "シーンを入力してください";

    }elseif(empty($phrase)){
        $error = "英語フレーズを入力してください";

    }elseif(empty($translation)){
        $error = "日本語訳を入力してください";
    }

    // エラーなしなら保存
    if(empty($error)){
        $sql = "INSERT INTO poststb (user_id, username, situation, phrase, translation) 
                VALUES (:user_id, :username, :situation, :phrase, :translation)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);
        $stmt->bindValue(":situation", $situation, PDO::PARAM_STR);
        $stmt->bindValue(":phrase", $phrase, PDO::PARAM_STR);
        $stmt->bindValue(":translation", $translation, PDO::PARAM_STR);

        $stmt->execute();

        // 投稿後リダイレクト（リロード対策）
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>投稿ページ</title>
<link rel="stylesheet" href="m6.css">
</head>
<body>
<h1>Speak Ready ~英語フレーズ共有アプリ～ </h1>
<h2>投稿フォーム</h2>
<div class="post">
<!-- エラー表示 -->
<?php if($error): ?>
<p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>

<form action="" method="post">
    <textarea name="situation" placeholder="使用シーン"></textarea><br/>

<textarea name="phrase" placeholder="フレーズ"></textarea><br/>

<textarea name="translation" placeholder="日本語訳"></textarea><br/>


<button type="submit" name="submit">投稿する</button>

</form>
<a href="index.php">戻る</a>
</div>
<br>



</body>
</html>