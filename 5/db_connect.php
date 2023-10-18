<?php

// config.phpを読み込む
require_once('config.php');

/**
 * データベースに接続するPDOインスタンスを返却する
 * @return PDO
 */
function db_connect() {
    try {
        $pdo = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        // エラーログを記録するか、エラーページを表示するなど、適切なエラーハンドリングを行う
        die('データベースに接続できませんでした');
    }
}
