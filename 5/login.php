<?php
// セッション開始
session_start();

// db_connect.phpを読み込む
require_once('db_connect.php');

$errorMessage = ''; // エラーメッセージを初期化

// $_POSTが空ではない場合
if (!empty($_POST)) {
    // ログイン名が入力されていない場合の処理
    if (empty($_POST["name"])) {
        $errorMessage = "名前が未入力です.";
    }
    // パスワードが入力されていない場合の処理
    if (empty($_POST["password"])) {
        $errorMessage = "パスワードが未入力です.";
    }

    // 両方共入力されている場合
    if (!empty($_POST["name"]) && !empty($_POST["password"])) {
        // ログイン名のエスケープ処理
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $pass = $_POST['password']; // パスワードのエスケープ処理は不要

        // ログイン処理開始
        $pdo = db_connect();
        try {
            // データベースアクセスの処理文。ログイン名があるか判定
            $sql = "SELECT * FROM users WHERE name = :name";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
        } catch (PDOException $e) {
            // エラーメッセージの出力
            echo 'Error: ' . $e->getMessage();
            die();
        }

        // 結果が1行取得できたら
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // パスワードの検証
            if (password_verify($pass, $row['password'])) {
                // セッションに値を保存
                $_SESSION["user_id"] = $row['id'];
                $_SESSION["user_name"] = $row['name'];
                // リダイレクト
                header("Location: main.php");
                exit;
            } else {
                // パスワードが違っていた場合
                $errorMessage = "パスワードに誤りがあります.";
            }
        } else {
            // ログイン名がなかった場合
            $errorMessage = "ユーザー名かパスワードに誤りがあります.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>ログイン画面</h1><a class="signup" href="signUp.php">新規ユーザー登録</a>
    <form method="post" action="login.php">
        <input class="fill" type="text" name="name" placeholder="ユーザー名" /><br>
        <input class="fill" type="password" name="password" placeholder="パスワード" /><br>
        <input type="submit" value="ログイン">
    </form>
    <?php
    if (!empty($errorMessage)) {
        echo '<p>' . $errorMessage . '</p>';
    }
    ?>
</body>
</html>
