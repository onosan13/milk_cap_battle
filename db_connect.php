<?php

// DB接続設定
$host = 'localhost';
$dbname = 'test';
$username = 'root';
$password = 'shogo913';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("DB接続に失敗しました: " . $e->getMessage());
}

function mysql_excute($sql)
{
  global $pdo;
  try {
    $stmt = $pdo->query($sql);
    $db = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $db;
  } catch (PDOException $e) {
    echo "クエリ実行エラー: " . $e->getMessage();
  }
}
