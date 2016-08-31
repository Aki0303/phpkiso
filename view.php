<?php
// ①DBへ接続
  $dsn = 'mysql:dbname=phpkiso;host=localhost';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8');

  // ②SQL文の作成
  $sql = 'SELECT * FROM `survey` WHERE 1';
    // SQLを実行
  $stmt = $dbh->prepare($sql);
  $stmt->execute();

  while (1) {
    // データを取得する
    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($rec == false) {
      break;
    }
    echo $rec['code'];
    echo $rec['nickname'];
    echo $rec['email'];
    echo $rec['content'];
    echo '<br>';
  }

  // ③DB切断
  $dbh = null;

?>