<?php
// DBサーバのURL
$db['host'] = "localhost";
// ユーザー名
$db['user'] = "root";
// ユーザー名のパスワード
$db['pass'] = "root";
// データベース名
$db['dbname'] = "YIGroupBlog"; // 新しいデータベース名に変更

// エラーハンドリング
try {
    $dsn = sprintf('mysql:host=%s;dbname=%s;charset=utf8', $db['host'], $db['dbname']);
    $pdo = new PDO($dsn, $db['user'], $db['pass'], array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>