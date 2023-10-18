<?php
// db_connect.phpの読み込み
require_once('db_connect.php');

// config.phpの読み込み
require_once('config.php');

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

// 提出ボタンが押された場合
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // titleとdateとstockの入力チェック
    if (empty($_POST["title"])) {
        echo 'タイトルが未入力です.';
    } elseif (empty($_POST["date"])) {
        echo '発売日が未入力です.';
    } elseif (empty($_POST["stock"])) {
        echo '在庫数が未入力です.';
    } else {
        // 入力したtitleとdateとstockを格納
        $title = $_POST["title"];
        $date = $_POST["date"];
        $stock = $_POST["stock"];

        // PDOのインスタンスを取得
        $pdo = db_connect();

        try {
            // SQL文の準備
            $sql = "INSERT INTO books (title, date, stock) VALUES (:title, :date, :stock)";
            
            // プリペアドステートメントの準備
            $stmt = $pdo->prepare($sql);
            
            // 値をバインド
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':stock', $stock);
            
            // 実行
            $stmt->execute();
            
            // main.phpにリダイレクト
            header("Location: main.php");
            exit;
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
    <title>本新規登録</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>本登録画面</h1>
    <form method="post" action="register_book.php" id="myForm">
        <input class="fill" type="text" name="title" placeholder="タイトル" /><br>
        <input class="fill" type="text" name="date" placeholder="発売日 (yyyy/mm/dd)" /><br> <!-- 発売日のフィールドを修正 -->
        <br><p>在庫数</p><br>
        <input type="number" name="stock" min="1" placeholder="選択してください" /><br>
        <input type="submit" value="新規登録">
    </form><br>
    <?php
    if (!empty($errorMessage)) {
        echo '<p>' . $errorMessage . '</p>';
    }
    ?>
    <p><a href="main.php">在庫一覧画面に戻る</a></p>
</body>
</html>
