<?php
// db_connect.phpの読み込み
require_once('db_connect.php');

$errorMessage = ''; // エラーメッセージを初期化

// POSTで送られていれば処理実行
if (isset($_POST["signUp"])) {
    // ユーザー名とパスワードが未入力の場合エラーメッセージを設定
    if (empty($_POST["name"])) {
        $errorMessage = "ユーザー名を入力してください.";
    } elseif (empty($_POST["password"])) {
        $errorMessage = "パスワードを入力してください.";
    } else {
        // PDOのインスタンスを取得
        try {
            // データベースに接続
            $pdo = db_connect();

            // パスワードをハッシュ化
            $password = $_POST["password"];
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            // プリペアドステートメントの作成
            $stmt = $pdo->prepare("INSERT INTO users (name, password) VALUES (:name, :password)");

            // 値をセット
            $name = $_POST["name"];
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':password', $password_hash);

            // 実行
            if ($stmt->execute()) {
                echo "登録が完了しました.";
            } else {
                $errorMessage = "ユーザーの登録に失敗しました.";
            }
        } catch (PDOException $e) {
            // エラーメッセージの出力
            echo 'Error: ' . $e->getMessage();
            // 終了
            die();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>ユーザー登録</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>ユーザー登録画面</h1>
    <form method="post" action="signUp.php">
        <input class="fill" type="text" name="name" placeholder="ユーザー名" /><br>
        <input class="fill" type="password" name="password" placeholder="パスワード" /><br>
        <input type="submit" id="signUp" name="signUp" value="新規登録">
    </form>
    <?php
    if (!empty($errorMessage)) {
        echo '<p>' . $errorMessage . '</p>';
    }
    ?><br>
    <p><a href="login.php">ログイン画面に戻る</a></p>
</body>
</html>
