<?php
function connect() {
    $host = 'localhost';
    $dbname = 'checktest4';
    $username = 'root';
    $password = 'root';

    try {
        // PDOインスタンスを作成してデータベースに接続
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        // エラーモードを例外モードに設定
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("データベースに接続できません: " . $e->getMessage());
    }
}
?>
