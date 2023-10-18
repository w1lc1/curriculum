<?php
// セッション開始
session_start();
// セッションにユーザーIDがなければlogin.phpにリダイレクト
if (empty($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

// db_connect.phpを読み込む
require_once('db_connect.php');

// データベースからデータを取得
$pdo = db_connect();
try {
    $sql = "SELECT * FROM books"; // booksテーブルに対する適切なクエリを記述
    $stmt = $pdo->query($sql);
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>在庫一覧</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>在庫一覧画面</h1><br>
    <a class="registerbook" href="register_book.php">新規登録</a>
    <a class="logout" href="logout.php">ログアウト</a>
    <table>
        <tr>
            <th>タイトル</th>
            <th>発売日</th>
            <th>在庫数</th>
            <th>削除</th>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td><a class="delete" href="delete_book.php?id=<?php echo $row['id']; ?>">削除</a></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
