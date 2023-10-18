<?php
// セッション開始
session_start();

// セッション破棄
session_destroy();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>ログアウト</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>ログアウト画面</h1><br>
    <p>ログアウトが完了しました。</p><br>
    <p><a href="login.php">ログイン画面に戻る</a></p>
</body>
</html>
