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

// IDが渡されているか確認
if (isset($_GET["id"])) {
    // 渡されたIDを取得
    $id = $_GET["id"];
    
    // データベース接続
    $pdo = db_connect();
    
    try {
        // 削除クエリの準備と実行
        $sql = "DELETE FROM books WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        if ($stmt->execute()) {
            // 削除成功
            header("Location: main.php");
            exit;
        } else {
            echo "削除に失敗しました";
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
